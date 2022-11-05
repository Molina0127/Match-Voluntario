<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgetPasswordController extends Controller
{
    //

    public function showForm() {
        return view('auth.passwords.email');
    }
}