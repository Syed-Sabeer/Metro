<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;


class NotificationController extends Controller
{
    public function Notification(Request $request)
    {
        // Fetch up to 20 unread notifications
        $unreadNotifications = Notification::where('status', 0)->where('to', Auth::id())
            ->orderBy('created_at', 'desc')
            ->limit(20)
            ->get();

        // Fetch up to 10 read notifications
        $readNotifications = Notification::where('status', 1)->where('to', Auth::id())
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        // Pass notifications to the view
        return view('notification.notify', compact('unreadNotifications', 'readNotifications'));
    }

    public function markAsRead($id)
    {
        // Find the notification by ID
        $notification = Notification::findOrFail($id);

        // Update the status to 1 (read)
        $notification->status = 1;
        $notification->save();

        $notification = [
            'message' => 'Your Notification Has Been Read Successfully',
            'alert-type' => 'success',
        ];

        // Redirect back to the notification page
        return redirect()->route('index.notification')->with($notification);
    }


    public function delete($id)
    {
        // Find the notification by ID
        $notification = Notification::findOrFail($id);

        // Delete the notification
        $notification->delete();

        // Set the notification message
        $notification = [
            'message' => 'Your Notification Has Been Read Successfully',
            'alert-type' => 'success',
        ];

        // Redirect back with the success message
        return redirect()->route('index.notification')->with($notification);
    }
}
