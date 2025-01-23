<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseParticipant extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Relationship with Casenew
    // public function case()
    // {
    //     return $this->belongsTo(Casenew::class, 'case_id');
    // }

    // // Relationship with User (assuming participants are users)
    // public function participant()
    // {
    //     return $this->belongsTo(User::class, 'participant_id');
    // }
}
