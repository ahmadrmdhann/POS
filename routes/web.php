<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'home']);

Route::get('/category/food-beverage', [CategoryController::class, 'foodBeverage']);
Route::get('/category/beauty-health', [CategoryController::class, 'beautyHealth']);
Route::get('/category/home-care', [CategoryController::class, 'homeCare']);
Route::get('/category/baby-kid', [CategoryController::class, 'babyKid']);

Route::get('user/{id}/name/{name}', [ProfileController::class, 'profile']);

Route::get('/transaction', [TransactionController::class, 'transaction']);
