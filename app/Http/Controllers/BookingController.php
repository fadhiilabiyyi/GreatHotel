<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use App\Models\Reservation;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $title = "Pesan Kamar";
        $rooms = Room::all();

        return view('hotel_guest.booking', compact('rooms'));
    }

    public function store(Request $request)
    {
        // ddd($request);

        $bookingRules = [
            'order_name' => 'required',
            'email' => 'required|email:dns',
            'telephone' => 'required|numeric',
            'room_id' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
        ];


        $validateBooking = $request->validate($bookingRules);

        $validateBooking['user_id'] = auth()->user()->id;
        $validateBooking['status'] = 'booking';

        Booking::create($validateBooking);

        return redirect('/dashboard')->with('success', 'New Reservation has been added');
    }
}
