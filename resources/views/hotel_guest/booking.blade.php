@extends('layouts.hotel_guest')

@section('container')
    
<div class="container-fluid mt-4 mb-5 row">
    <div class="col-md-10">
        <h2 class="mb-4">Form Pemesanan</h2>

        <form action="{{ route('reservation') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="order_name" class="form-label text-dark">Nama Pemesan</label>
                <input type="text" class="form-control" id="order_name" name="order_name" required>
                @error('order_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label text-dark">Email</label>
                <input type="text" class="form-control" id="email" name="email" required>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="telephone" class="form-label text-dark">No Telephone</label>
                <input type="text" class="form-control" id="telephone" name="telephone" required>
                @error('telephone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="room_id" class="form-label text-dark">Tipe Kamar</label>
                <select class="form-select mb-3" id="room_id" name="room_id">
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->room_type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="check_in" class="form-label text-dark">Check In</label>
                <input type="datetime-local" class="form-control" id="check_in" name="check_in" required>
                @error('check_ind')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="check_out" class="form-label text-dark">Check Out</label>
                <input type="datetime-local" class="form-control" id="check_out" name="check_out" required>
                @error('check_out')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary float-end">Konfirmasi Pesanan</button>
        </form>
    </div>    
</div>    

@endsection