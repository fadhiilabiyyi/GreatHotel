<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Booking;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function print(Booking $reservation)
    {
        $data = [
            'id' => $reservation->id,
            'order_name' => $reservation->order_name,
            'email' => $reservation->email,
            'telephone' => $reservation->telephone,
            'room_type' => $reservation->room->room_type,
            'check_in' => $reservation->check_in,
            'check_out' => $reservation->check_out,
            'status' => $reservation->status,
        ];

        $pdf = PDF::loadview('hotel_guest.print', $data);

        return $pdf->download('struk-' . $data['id'] . '.pdf');
    }
}
