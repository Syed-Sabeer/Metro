<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomParticipant extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function case()
    {
        return $this->belongsTo(Casenew::class, 'case_id', 'id');
    }

    // Define the relationship with User model (if necessary)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
