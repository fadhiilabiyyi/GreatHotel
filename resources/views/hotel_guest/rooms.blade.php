@extends('layouts.hotel_guest')

@section('container')

<div class="py-5">
    @foreach ($rooms as $room)
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="{{ asset('storage/' . $room->image) }}" class="d-block mx-lg-auto img-fluid" alt="{{ $room->room_type }} Room Image" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h2 class="display-5 fw-bold lh-1 mb-3">{{ $room->room_type }}</h2>
                <p class="lead">{{ $room->description }}</p>
                <p class="lead">Fasilitas : </p>
                <ul>
                    <li>{{ $room->facility->facility_name }}</li>
                </ul>
            </div>
        </div>
    @endforeach
</div>

@endsection