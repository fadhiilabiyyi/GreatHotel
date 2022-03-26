@extends('layouts.receptionist')

@section('container')

<h1 class="h2">{{ $title }}</h1>

@if (session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
    </div>
@endif

<form action="{{ url()->current() }}" autocomplete="off">
    <div class="w-25 input-group mb-3 input-group-sm">
        <input type="search" class="form-control sm" placeholder="Search Name" name="search" value="{{ request('search') }}">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
    </div>
</form>

<form action="{{ url()->current() }}" autocomplete="off">
    <h2 class="h4">Search By Date</h2>
    <div class="w-50 input-group mb-3 input-group-sm">
        <input type="date" class="form-control sm" name="date1" value="{{ request('date1') }}">
        <input type="date" class="form-control sm" name="date2" value="{{ request('date2') }}">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
    </div>
</form>

<div class="table-responsive col-lg-12">
    <table class="table table-sm table-bordered table-hover border-dark text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Tamu</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($reservations->count())
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $reservation->order_name }}</td>
                    <td>{{ $reservation->check_in->formatLocalized('%A, %d %B %Y Pukul : %H.%M ') }}</td>
                    <td>{{ $reservation->check_out->formatLocalized('%A, %d %B %Y Pukul : %H.%M ') }}</td>
                    <td>
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
                    </td>
                    <td>
                        <a href="{{ route('reservations.show', $reservation->id) }}" class="badge bg-info">
                            <span>Detail</span></a>

                        <form action="{{ route('reservations.destroy', $reservation->id) }}" method="post" class="d-inline">    
                            @method('delete')
                            @csrf

                            <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Menghapus Data Ini Akan Mempengaruhi Data Lain, Anda Yakin?')"><span>Delete</span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            @else
                <tr>
                    <td colspan="6">Data tidak ditemukan!</td>
                </tr>
            @endif
            
        </tbody>
    </table>
    
    {{ $reservations->links() }}
</div>

@endsection