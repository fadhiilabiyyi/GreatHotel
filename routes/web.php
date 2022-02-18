<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/facilities', function () {
    return view('hotel_guest.facilities');
});

Route::get('/rooms', function () {
    return view('hotel_guest.rooms');
});

Route::get('/booking', function () {
    return view('hotel_guest.booking');
});

Route::get('/admin/facilities/index', function () {
    return view('admin.facilities.index');
});

Route::get('/login', [LoginController::class, 'login'])->name('login'); // middleware->('guest')

Route::get('/register', [RegisterController::class, 'register']);