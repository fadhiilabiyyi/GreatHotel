<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'hotel_guest' ) {
            return view('hotel_guest.index');
        } elseif (Auth::user()->role === 'administrator' ) {
            return view('admin.index');
        } else {
            return view('admin.index');
        }
    }
}
