@extends('layouts.admin')

@section('container')

<h1 class="h2">{{ $title }}</h1>

@if (session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
    </div>
@endif

<form action="/dashboard/reservations">
    <div class="w-25 input-group mb-3">
        <input type="text" class="form-control" placeholder="Search Name" name="search">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Button</button>
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
            @foreach ($reservations as $reservation)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $reservation->booking->order_name }}</td>
                <td>{{ $reservation->check_in }}</td>
                <td>{{ $reservation->check_out }}</td>
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

                    <a href="{{ route('reservations.edit', $reservation->id) }}" class="badge bg-warning" onclick="return confirm('Apakah Anda Yakin?')">
                        <span>Edit</span></a>

                        <form action="{{ route('reservations.destroy', $reservation->id) }}" method="post" class="d-inline">
                            
                            @method('delete')
                            @csrf

                            <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Menghapus Data Ini Akan Mempengaruhi Data Lain, Anda Yakin?')"><span>Delete</span></button>

                        </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    

    {{ $reservations->links() }}
</div>

@endsection