@extends('layouts.hotel_guest')

@section('container')

<div class="mb-5 mt-5">
    <h2 class="mt-3 mb-5 text-center">Fasilitas</h2>
    <div class="row">
        @foreach ($facilities as $facility)
        <div class="col-md-4 mb-5">
            <div class="card bg-dark" style="max-height: 250px; overflow:hidden">
                <img src="{{ asset('storage/' . $facility->image) }}" alt="" class="img-fluid"> 
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection