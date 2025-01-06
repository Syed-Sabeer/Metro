<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Casenew;
use Illuminate\Support\Facades\Auth;
use App\Models\RoomParticipant;
use App\Models\CaseFile;

class CaseController extends Controller
{
    public function Cases()
    {
        $statuses = Status::orderBy('status_number', 'ASC')->get();
        $randomNumber = random_int(1000, 9999);
        $case_owner = User::where('id', Auth::id())->value('name');
        // dd($case_owner);
        $cases = Casenew::all();
        // dd($cases);
        return view('cases', compact('statuses', 'randomNumber', 'case_owner', 'cases'));
    }

    public function storecase(Request $request)
    {
        $client_id = User::where('email', $request->user_name)->value('id');
        $case = new Casenew;
        $case->status_id = $request->status_id;
        $case->origin = $request->case_origin;
        $case->priority = $request->priority;
        $case->owner_id = Auth::id();
        $case->client_id = $client_id;
        $case->case_no = $request->case_no;
        $case->account_name = $request->account_name;
        $case->subject = $request->subject;
        $case->description = $request->description;
        $case->save();

        $superadmins = User::where('role', 'supperadmin')->get();
        $admins = User::where('role', 'admin')->get();

        $userIds = [$client_id];

        foreach ($superadmins as $superadmin) {
            $userIds[] = $superadmin->id;
        }

        foreach ($admins as $admin) {
            $userIds[] = $admin->id;
        }

        foreach ($userIds as $userId) {
            $participant = new RoomParticipant;
            $participant->case_id = $case->id;
            $participant->user_id = $userId;
            $participant->save();
        }

        return redirect()->back()->with('success', 'Case added successfully!');
    }


    public function viewCase($id)
    {
        session(['room_id' => $id]);
        $case = Casenew::findOrFail($id);
        $statuses = Status::orderBy('status_number')->get();
        // dd($case, $statuses);
        $caseFiles = CaseFile::where('case_id', $id)->get();
        // dd($caseFiles);
        return view('caseview', compact('case', 'caseFiles', 'statuses')); // Or return a proper view
    }


    public function casefileupload(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip|max:2048', // Adjust MIME types and size limit as needed
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Generate a unique filename
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Define the path to store the file inside the public directory
            $filePath = public_path('uploads/' . $fileName);

            // Move the uploaded file to the public folder
            $file->move(public_path('uploads'), $fileName);

            // Save the file path in the database
            CaseFile::create([
                'case_id' => $id,
                'file_path' => 'uploads/' . $fileName, // Store the relative path
            ]);

            $notification = [
                'message' => 'File uploaded successfully!',
                'alert-type' => 'success',
            ];

            return back()->with($notification);
        }

        $notification = [
            'message' => 'No file was uploaded.',
            'alert-type' => 'error',
        ];

        return back()->with($notification);
    }


    // Forward Status Update
public function forwardStatus($id, Request $request)
{
    $case = Casenew::findOrFail($id);

    // Check if the next status exists in the Status table
    $nextStatus = Status::find($case->status_id + 1);

    if ($nextStatus) {
        // Increment the status_id
        $case->status_id += 1;
        $case->save();

        $notification = [
            'message' => 'Status updated forward successfully!',
            'alert-type' => 'success',
        ];

        return back()->with($notification);
    }

    $notification = [
        'message' => 'Cannot move forward. No next status available.',
        'alert-type' => 'error',
    ];

    return back()->with($notification);
}

    // Backward Status Update
    public function backStatus($id, Request $request)
    {
        $case = Casenew::findOrFail($id);

        // Check if the previous status exists in the Status table
        $previousStatus = Status::find($case->status_id - 1);

        if ($previousStatus) {
            // Decrement the status_id
            $case->status_id -= 1;
            $case->save();

            $notification = [
                'message' => 'Status updated backward successfully!',
                'alert-type' => 'success',
            ];

            return back()->with($notification);
        }

        $notification = [
            'message' => 'Cannot move backward. No previous status available.',
            'alert-type' => 'error',
        ];

        return back()->with($notification);
    }


    public function show()
    {
        return view('casesview');
    }

    public function SearchMember(Request $request)
    {
        $query = $request->input('q');
        // Perform the search query (modify the model and fields as needed)
        $members = User::where('email', 'LIKE', '%' . $query . '%')->take(10)->get(['id', 'email']);

        return response()->json($members);
    }
}
