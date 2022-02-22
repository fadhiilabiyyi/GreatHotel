<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'hotel_guest' ) {
            $title = 'Guest Dashboard';
            return view('hotel_guest.index', compact('title'));
        } elseif (Auth::user()->role === 'administrator' ) {
            $title = 'Administrator Dashboard';
            return view('admin.index', compact('title'));
        } else {
            return view('admin.index');
        }
    }
}
