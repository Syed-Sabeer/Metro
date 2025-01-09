<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Casenew;
use Illuminate\Support\Facades\Auth;
use App\Models\RoomParticipant;
use App\Models\Casefile;
use App\Models\Room;



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
        // Debugging: Verify all incoming data
        // dd($request->all());

        // Fetch the client ID based on the provided email
        $client_id = User::where('email', $request->customer_email)->value('id');

        // Create a new case
        $case = new Casenew;
        $case->status_id = $request->case_status;
        $case->origin = $request->case_origin;
        $case->priority = $request->priority;
        $case->owner_id = Auth::id();
        $case->client_id = $client_id;
        $case->case_no = $request->case_no;
        $case->account_name = $request->account_name;
        $case->subject = $request->subject;
        $case->description = $request->description;
        $case->save();

        // Create a new room associated with the case
        $room = new Room;
        $room->case_id = $case->id;
        $room->save();

        // Fetch superadmins and admins
        $superadmins = User::where('role', 'supperadmin')->get();
        $admins = User::where('role', 'admin')->get();

        // Collect all participant IDs
        $userIds = [$client_id]; // Add the client ID
        foreach ($superadmins as $superadmin) {
            $userIds[] = $superadmin->id;
        }
        foreach ($admins as $admin) {
            $userIds[] = $admin->id;
        }

        // Add employee IDs from the request
        if (!empty($request->employee_emails)) {
            foreach ($request->employee_emails as $employeeId) {
                $userIds[] = $employeeId;
            }
        }

        // Store participants in the RoomParticipant table
        foreach ($userIds as $userId) {
            $participant = new RoomParticipant;
            $participant->case_id = $case->id;
            $participant->user_id = $userId;
            $participant->room_id = $room->id;
            $participant->save();
        }

        $notification = array(
            'message' => 'New Case Created Successfully',
            'alert-type' => 'success',
        );

        // Redirect with a success message
        return redirect()->back()->with($notification);
    }



    public function viewCase($id)
    {
        session(['room_id' => $id]);
        $case = Casenew::findOrFail($id);
        $statuses = Status::orderBy('status_number')->get();
        // dd($case, $statuses);
        $caseFiles = Casefile::where('case_id', $id)->get();
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
            Casefile::create([
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
        $members = User::where('email', 'LIKE', '%' . $query . '%')->where('role', 'customer')->take(10)->get(['id', 'email']);

        return response()->json($members);
    }

    public function SearchEmployee(Request $request)
    {
        $query = $request->input('q');
        $employees = User::where('email', 'LIKE', '%' . $query . '%')
                         ->where('role', 'employee') // Ensure the role is 'employee'
                         ->limit(3) // Explicitly limit the results to 3
                         ->get(['id', 'email']); // Return id and email for frontend processing

        return response()->json($employees);
    }
}
