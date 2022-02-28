<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'administrator') {
            $title = 'Administrator Dashboard';

            return view('admin.index', compact('title'));
        } elseif (Auth::user()->role === 'receptionist') {
            $title = 'Receptionist Dashboard';

            return view('receptionist.index', compact('title'));
        } else {
            $title = 'Guest Dashboard';

            return view('hotel_guest.index', compact('title'));
        }
    }
}
