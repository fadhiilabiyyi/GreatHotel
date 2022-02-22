@extends('layouts.hotel_guest')

@section('container')
<div class="mb-5 mt-5">
    <h2 class="mt-3 mb-5 text-center">Fasilitas</h2>
    <div class="row">
        <div class="col-md-4 mb-5">
            <div class="card bg-dark">
                <img src="https://source.unsplash.com/250x250?room" class="card-img" alt="">
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card bg-dark">
                <img src="https://source.unsplash.com/250x250?restaurant" class="card-img" alt="">
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card bg-dark">
                <img src="https://source.unsplash.com/250x250?playground" class="card-img" alt="">
            </div>
        </div>
    </div>
</div>
@endsection