<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function caseNews()
    {
        return $this->belongsTo(Casenews::class, 'case_id');
    }
    public function participants()
    {
        return $this->hasMany(RoomParticipant::class);
    }
}
