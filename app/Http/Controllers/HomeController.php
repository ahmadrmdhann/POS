<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public static function home()
    {
        return view('home')
        -> with('name', 'Ramadhan');
    }
}
