<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casenew;
use App\Models\Message;
use App\Models\User;
use App\Models\RoomParticipant;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Events\MessageSent;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    //
    public function getRooms($case_id)
    {
        $rooms = Room::where('case_id', $case_id)->pluck('id','name');
        return response()->json($rooms);
    }

    public function getMessages($roomId)
    {

        return Message::with('sender')->where('room_id', $roomId)->get();
    }
    public function getRoomPar($roomId)
{
    return  RoomParticipant::where('room_id', $roomId)
                                    ->with('user') // Eager load the related user data
                                    ->get();

}

public function createRoom(Request $request) {
    $validated = $request->validate([
        'roomName' => 'required|string|max:255',
        'caseId' => 'required|integer',
        'userIds' => 'required|array',
        'userIds.*' => 'integer|exists:users,id',
    ]);

    // Create the room
    $room = Room::create([
        'name' => $validated['roomName'],
        'case_id' => $validated['caseId'],
    ]);

    // Attach users to the room
    foreach ($validated['userIds'] as $userId) {
        RoomParticipant::create([
            'room_id' => $room->id,
            'user_id' => $userId,
            'case_id' => $validated['caseId'],
        ]);
    }

    return response()->json([
        'message' => 'Room and participants added successfully',
        'room' => $room,
    ]);

    return response()->json(['message' => 'Room created successfully!', 'room' => $room]);
}
    public function sendMessage(Request $request)
    {
        $message = Message::create([
            'sender_id' => $request->sender_id,
            'room_id' => $request->room_id,
            'message' => $request->message,
        ]);

        return $message->load('sender');
    }


}
