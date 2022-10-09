<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OngsController extends Controller
{
    //

    public function show() {
        return view('site.ongs.ongs_details');
    }

    public function index() {
        return view('site.ongs.ongs');
    }
}
