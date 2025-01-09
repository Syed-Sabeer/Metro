<?php

namespace App\Http\Controllers;

use App\Models\Casenew;
use Illuminate\Http\Request;

class CustomerCaseController extends Controller
{
    public function index()
    {
        $casedata = Casenew::all();
        return view('userindex', compact('casedata'));
    }
}
