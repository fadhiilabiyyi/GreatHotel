@extends('layouts.admin')

@section('container')

<h1 class="h2 mb-3">{{ $title }}</h1>

<div class="row">
    <div class="col-lg-10">
        <a href="{{ route('rooms.index') }}" class="btn btn-secondary mb-3">Back</a>
        <div class="card mb-3">
            <img src="{{ asset('storage/' . $room->image) }}" class="card-img-top" alt="Gambar Kamar {{ $room->room_type }}">
            <div class="card-body">
                <h5 class="card-title">{{ $room->room_type }} : Jumlah Kamar {{ $room->number_of_rooms }}</h5>
                <p class="card-text">Fasilitas : {{ $room->facility->facility_name }}</p>
                <p class="card-text">{{ $room->description }}</p>
                <p class="card-text"><small class="text-muted">{{ $room->created_at->diffForHumans() }}</small></p>
            </div>
          </div>
    </div>
</div>

@endsection