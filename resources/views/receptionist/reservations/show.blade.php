@extends('layouts.receptionist')

@section('container')

<h1 class="h2">{{ $title }}</h1>

@if (session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="table-responsive col-lg-12">
    <a href="{{ route('reservations.index') }}" class="btn btn-secondary mb-3">Back</a>
    <div class="card">
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
                Tanggal Check Out : {{ $reservation->check_out->formatLocalized('%A, %d %B %Y Pukul : %H.%M ') }} <br>
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
                <!-- Button trigger modal -->
                <br> <button type="button" class="btn btn-sm btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Update Status
                </button>
            </p>
        </div>
    </div>    
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('updateStatus', $reservation->id) }}" method="post">
                    <div class="mb-3">
                        @method('PUT')
                        @csrf
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status" id="status" required>
                            @switch($reservation->status)
                                @case('check_in')
                                    <option value="check_in" selected>Check In</option>
                                    <option value="check_out">Check Out</option> 
                                    <option value="booking">Booking</option>
                                    @break
                                @case('check_out')
                                    <option value="check_out" selected>Check Out</option> 
                                    <option value="check_in">Check In</option>
                                    <option value="booking">Booking</option>
                                    @break
                                @default
                                    <option value="booking" selected>Booking</option>
                                    <option value="check_in">Check In</option> 
                                    <option value="check_out">Check Out</option> 
                            @endswitch   
                        </select>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection