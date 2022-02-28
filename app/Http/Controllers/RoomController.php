<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $title = 'Kamar';
        $rooms = Room::all();
    
        return view('hotel_guest.rooms', compact('title', 'rooms'));
    }
}
