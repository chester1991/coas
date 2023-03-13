<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControlController extends Controller
{
    public function master()
    {
        return view('layouts.master');
    }

    public function home()
    {
        return view('control.home');
    }
}
