<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casefile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function case()
    {
        return $this->belongsTo(Casenew::class, 'case_id');
    }
}
