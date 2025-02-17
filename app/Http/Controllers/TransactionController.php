<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public static function transaction()
    {
        return view('transaction')
        -> with('name', 'ramadhan')
        -> with('product', 'detergent')
        -> with('amount', 2);
    }
}
