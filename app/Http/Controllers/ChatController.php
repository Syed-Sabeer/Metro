<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casenew;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Events\MessageSent;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    //
    public function getRooms()
    {
        return Casenew::with('participants')->get();
    }
    
    public function getMessages($roomId)
    {
        return Message::with('sender')->where('room_id', $roomId)->get();
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
