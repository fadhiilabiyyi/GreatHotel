<?php

namespace App\Http\Controllers\Receptionist;

use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReceptionistReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Data Reservasi';
        
        $reservations = Booking::when($request->search, function ($query) use ($request) {
            $query->where('order_name', 'like', "%{$request->search}%");
        })->orderBy('created_at', 'desc')->paginate(5);
    
        $reservations->appends($request->only('search'));

        if (request()->date1 || request()->date2) {
            $date1 = Carbon::parse(request()->date1)->toDateTimeString();
            $date2 = Carbon::parse(request()->date2)->toDateTimeString();
            $reservations = Booking::whereBetween('check_in', [$date1, $date2])->orderBy('created_at', 'desc')->paginate(5);
        } else {
            $data = Booking::latest()->get();
        }

        return view('receptionist.reservations.index', compact('title', 'reservations')) 
                ->with('i', (request('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $reservation)
    {
        $title = 'Detail | Data Reservasi';

        return view('receptionist.reservations.show', compact('title', 'reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $reservation)
    {
        Booking::destroy($reservation->id);

        return redirect('/dashboard/hotel-facilities')->with('success', 'Hotel Facility has been removed');
    }

    public function updateStatus(Request $request, Booking $reservation)
    {
        $rules = ['status' => 'required'];

        $validatedData = $request->validate($rules);

        Booking::where('id', $reservation->id)->update($validatedData);

        return redirect('/dashboard/reservations/'.$reservation->id)->with('success', 'Status has been updated');
    }
}
