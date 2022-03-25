@extends('layouts.hotel_guest')

@section('container')

    <h1 class="">Detail Reservasi</h1>
    <div class="text-center">
        <em class="mt-3 mb-3">Silahkan Print Bukti Reservasi</em>
    </div>

    <div class="mt-3 card">
        <div class="card-header">
            {{ 'ID Registrasi : ' . $reservation->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $reservation->order_name }}</h5>
            <p class="card-text">
                Email : {{ $reservation->email }} <br>
                No Telp : {{ $reservation->telephone }} <br>
                Kamar : {{ $reservation->room->room_type }}
            </p>
            <p class="card-text">
                Informasi Reservasi <br>
                Tanggal Check In : {{ $reservation->check_in->formatLocalized('%A, %d %B %Y Pukul : %H.%M ') }} <br>
                Tanggal Check Out : {{ $reservation->check_in->formatLocalized('%A, %d %B %Y Pukul : %H.%M ') }} <br>
                Status : 
                @switch($reservation->status)
                    @case('check_in')
                        <strong>Check In</strong>
                        @break
                    @case('check_out')
                        <strong>Check Out</strong>
                        @break
                    @default
                        <strong>Booking</strong>
                @endswitch 
                <br>
                <a href="{{ route('print', $reservation->id) }}" class="mt-3 btn btn-sm btn-primary">Print Bukti Reservasi</a>
            </p>
        </div>
    </div>      

@endsection

