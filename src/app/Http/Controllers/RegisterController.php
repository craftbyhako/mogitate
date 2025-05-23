<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\RegisterController;

class RegisterController extends Controller
{
    //
    public function create()
    {
        return view('register');
    }
}
