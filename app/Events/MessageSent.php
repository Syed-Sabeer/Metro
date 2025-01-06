<?php

namespace App\Events;
use App\Models\Message; 
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $message;
 
    /**
     * Create a new event instance.
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function broadcastOn()
    {
        // Channel for specific conversation between sender and receiver
        return new Channel('chat.' . $this->message->receiver_id);
    }

    /**
     * Specify the event name.
     */
    public function broadcastAs()
    {
        return 'message.sent';
    }
}
