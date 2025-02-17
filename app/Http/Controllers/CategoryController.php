<?php

namespace App\Http\Controllers;

class CategoryController extends Controller
{
    public static function foodBeverage()
    {
        return view('category')
        -> with('product1', 'Pizza')
        -> with('product2', 'Burger');
    }
    public static function beautyHealth()
    {
        return view('category')
        -> with('product1', 'Make Up')
        -> with('product2', 'Facial Wash');
    }
    public static function homeCare()
    {
        return view('category')
        -> with('product1', 'Sabun')
        -> with('product2', 'Detergent');
    }
    public static function babyKid()
    {
        return view('category')
        -> with('product1', 'Tisu Basah')
        -> with('product2', 'Popok');
    }
}
