@extends('layouts.hotel_guest')

@section('container')

    <h1 class="">Data Reservasi Saya</h1>

    @foreach (auth()->user()->bookings as $reservation)
    <div class="card mb-3 col-md-5">
        <div class="card-header">
            <a href="{{ route('detail-reservation', $reservation->id) }}">{{ 'ID Registrasi : ' . $reservation->id }}</a>
            <p class="card-text">
                Tanggal : {{ $reservation->created_at }}
            </p>
        </div>
    </div>    
    @endforeach
@endsection

