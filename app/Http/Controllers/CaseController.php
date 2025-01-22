<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Casenew;
use Illuminate\Support\Facades\Auth;
use App\Models\RoomParticipant;
use App\Models\Casefile;
use Illuminate\Support\Facades\Mail;
use App\Models\Room;
use App\Models\Email;
use App\Models\Message;
use App\Models\Notification;

class CaseController extends Controller
{
    public function Cases()
    {
        $statuses = Status::orderBy('status_number', 'ASC')->get();
        $randomNumber = random_int(1000, 9999);
        $case_owner = User::where('id', Auth::id())->value('name');
        // dd($case_owner);
        $cases = Casenew::orderBy('created_at', 'desc')->get();

        $totalRows = Status::latest('status_number')->value('status_number');
        $totalcaese = Casenew::count();
        // dd($cases);
        return view('cases', compact('statuses', 'randomNumber','totalcaese', 'case_owner','totalRows', 'cases'));
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


            // Create notification for each participant
            $user = User::find($userId);
            $message = 'A new case has been created case # ' . $case->case_no;

            // Save the notification
            Notification::create([
                'to' => $userId,
                'from' => Auth::id(),
                'message' => $message,
                'status' => 0, // Unread notification
            ]);
        }

        // Check if the checkbox is checked (checkbox_value = 1)
        if ($request->checkbox_value == '1') {
            // Send emails to participants
            foreach ($userIds as $userId) {
                $userss = User::find($userId);
                $email = $userss->email;
                $data = [
                    'name' => $userss->name,  // Assuming $name is the variable containing the user's name
                    'message' => $request->description_1,  // Or any other content you want
                ];
                $sub = $request->subject_1;
                Mail::send('emails.user_credentials', $data, function ($message) use ($email, $sub) {
                    $message->to($email)
                            ->subject($sub);
                    // Embed the image in the email body using CID (Content-ID)
                    $message->embed(public_path('public/img/mailsign.png'), 'mailsign');
                });
            }
        }

        // Redirect with a success message
        $notification = array(
            'message' => 'New Case Created Successfully',
            'alert-type' => 'success',
        );

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
        $totalRows = Status::latest('status_number')->value('status_number');
        $color = Status::latest('status_number')->where('id', $case->status_id)->value('status_color_code');
        // dd($color);
        return view('caseview', compact('case', 'caseFiles', 'statuses', 'totalRows', 'color')); // Or return a proper view
    }


    public function casefileupload(Request $request, $id)
    {
        $request->validate([
            'files.*' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip,xls,xlsx|max:2048',
        ]);

        $showFile = $request->has('show_file') ? 1 : 0;

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = 'uploads/' . $fileName;

                $file->move(public_path('uploads'), $fileName);

                Casefile::create([
                    'case_id' => $id,
                    'file_path' => $filePath,
                    'filename' => $file->getClientOriginalName(),
                    'show_file' => $showFile,
                ]);
            }

            $notification = [
                'message' => 'Files uploaded successfully!',
                'alert-type' => 'success',
            ];

            return back()->with($notification);
        }

        $notification = [
            'message' => 'No files were uploaded.',
            'alert-type' => 'error',
        ];

        return back()->with($notification);
    }


    public function updateStatus($id, Request $request)
    {
        $request->validate([
            'status_id' => 'required|integer|exists:statuses,id',
        ]);

        $case = Casenew::findOrFail($id);
        $newStatusId = $request->input('status_id');

        // Check if the new status exists
        $status = Status::find($newStatusId);

        if ($status) {
            $case->status_id = $newStatusId;
            $case->save();

            $notification = [
                'message' => 'Status updated successfully!',
                'alert-type' => 'success',
            ];

            return back()->with($notification);
        }

        $notification = [
            'message' => 'Invalid status selected.',
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
        $members = User::where('email', 'LIKE', '%' . $query . '%')->where('status', 1)
        ->where('role', 'customer')->take(10)->get(['id', 'email','name']);

        return response()->json($members);
    }

    public function SearchEmployee(Request $request)
    {
        $query = $request->input('q');
        $employees = User::where('email', 'LIKE', '%' . $query . '%')->where('status', 1)
                         ->where('role', 'employee') // Ensure the role is 'employee'
                         ->limit(3) // Explicitly limit the results to 3
                         ->get(['id', 'email', 'name']); // Return id and email for frontend processing

        return response()->json($employees);
    }


    public function searchEmailIdentifier(Request $request)
    {
        $query = $request->get('q');  // Get the query parameter 'q'

        if ($query) {
            // Fetch identifier_name, subject, and description from the database based on the query
            $results = Email::where('identifier_name', 'like', '%' . $query . '%')
                            ->get(['identifier_name', 'subject', 'description']);  // Include subject and description

            return response()->json($results);  // Return as JSON
        }

        return response()->json([]);  // Return empty array if query is empty
    }


    public function getCaseDetails($id)
    {
        $case = Casenew::find($id); // Casenew is the model for your table
        if ($case) {
            return response()->json([
                'subject' => $case->subject,
                'description' => $case->description,
            ]);
        }
        return response()->json(['error' => 'Case not found'], 404);
    }


    public function updateCaseDetails(Request $request, $id)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $case = Casenew::find($id); // Adjust this based on your structure

        if ($case) {
            $case->subject = $request->subject;
            $case->description = $request->description;
            $case->save();

            // Flash notification
            $notification = array(
                'message' => 'Case Updated Successfully',
                'alert-type' => 'success',
            );

            return back()->with($notification);  // Redirect back with the notification
        }

        // Flash notification for failure
        $notification = array(
            'message' => 'Case not found',
            'alert-type' => 'error',
        );

        return back()->with($notification);  // Redirect back with the notification
    }
    public function Delete($id)
    {
        $room_id = Room::where('case_id', $id)->pluck('id');
        if ($room_id->isNotEmpty()) {
            $message = Message::whereIn('room_id', $room_id)->get();
            if ($message->isNotEmpty()) {
                $message->each(function ($msg) {
                    $msg->delete();
                });
            }
        }

        Room::where('case_id', $id)->delete();

        RoomParticipant::where('case_id', $id)->delete();

        Casefile::where('case_id', $id)->delete();

        $case = Casenew::find($id);
        if ($case) {
            $case->delete();
        }

        $notification = array(
            'message' => 'Case Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('add.cases')->with($notification);
    }


}
