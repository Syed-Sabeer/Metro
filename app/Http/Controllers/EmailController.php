<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;

class EmailController extends Controller
{
    public function index()
    {
        $emails = Email::all();
        return view('emails_index', compact('emails'));
    }

    public function create()
    {
        return view('emails_create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'identifier_name' => 'required|string|max:255|unique:emails,identifier_name', // updated to match DB column
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Create a new email record
        Email::create([
            'identifier_name' => $request->input('identifier_name'), // updated to match DB column
            'subject' => $request->input('subject'),
            'description' => $request->input('description'),
        ]);

        // Set custom notification
        $notification = [
            'message' => 'New Email created successfully',
            'alert-type' => 'success',
        ];

        // Redirect with custom notification
        return redirect()->route('emails.index')->with($notification);
    }

    public function edit(Email $email)
    {
        return view('emails_edit', compact('email'));
    }

    public function update(Request $request, Email $email)
    {
        // Validate the request
        $request->validate([
            'identifier_name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Update the email
        $email->update([
            'identifier_name' => $request->input('identifier_name'),
            'subject' => $request->input('subject'),
            'description' => $request->input('description'),
        ]);

        // Set custom notification
        $notification = [
            'message' => 'Email updated successfully',
            'alert-type' => 'success',
        ];

        // Redirect with success notification
        return redirect()->route('emails.index')->with($notification);
    }


    public function destroy(Email $email)
    {
        // Delete the email
        $email->delete();

        // Set custom notification
        $notification = [
            'message' => 'Email deleted successfully.',
            'alert-type' => 'success',
        ];

        // Redirect with custom notification
        return redirect()->route('emails.index')->with($notification);
    }
}
