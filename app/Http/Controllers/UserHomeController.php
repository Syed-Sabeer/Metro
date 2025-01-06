<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function index(){
        return view('userindex');
            }
            public function show(){
                return view('usercaseview');
                    }
}
