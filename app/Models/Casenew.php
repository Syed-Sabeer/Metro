<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casenew extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }


    public function room_participants()
    {
        return $this->hasMany(RoomParticipant::class, 'case_id', 'id');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class, 'case_id');
    }
    public function participants()
    {
        return $this->hasMany(CaseParticipant::class, 'case_id');
    }
}
