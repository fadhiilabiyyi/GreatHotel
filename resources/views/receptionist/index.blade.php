@extends('layouts.receptionist')

@section('container')
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>
@endsection