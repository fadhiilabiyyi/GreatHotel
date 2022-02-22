@extends('layouts.hotel_guest')

@section('container')
    {{ auth()->user()->name }}

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection