<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index()
    {
        $title = 'Fasilitas';
        $facilities = Facility::all();

        return view('hotel_guest.facilities', compact('title', 'facilities'));
    }
}
