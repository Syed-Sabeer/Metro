<?php

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