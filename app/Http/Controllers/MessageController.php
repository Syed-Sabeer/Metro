<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    public function index(Chat $chat) {
        return $chat->messages()->with('user')->get();
    }
    
    public function store(Request $request, Chat $chat) {
        $message = $chat->messages()->create([
            'user_id' => auth()->id(),
            'message' => $request->message,
        ]);
    
        return $message;
    }
}
