<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public static function profile($id, $name)
    {
        
        return view('profile')
        -> with('ID', $id)
        -> with('username', $name);
    }
}
