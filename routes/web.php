<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminRoomFacilityController;
use App\Http\Controllers\Admin\AdminHotelFacilityController;

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
})->middleware('guest');

// Login Routes
Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register Routes
Route::get('/register', [RegisterController::class, 'register'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('store')->middleware('guest');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Admin Dashboard
Route::resource('dashboard/users', AdminUserController::class)->except('show')->middleware('admin');
// Route::resource('dashboard/rooms', AdminUserController::class)->except('show')->middleware('admin');
Route::resource('dashboard/room-facilities', AdminRoomFacilityController::class)->except('show')->middleware('admin');
Route::resource('dashboard/hotel-facilities', AdminHotelFacilityController::class)->except('show')->middleware('admin');