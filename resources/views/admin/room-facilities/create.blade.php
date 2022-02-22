@extends('layouts.admin')

@section('container')
    
<h1 class="h2">Create Fasilitas Hotel</h1>

<div class="col-lg-8">
    <a href="{{ route('room-facilities.index') }}" class="btn btn-secondary mb-3">Back</a>

    <form action="{{ route('room-facilities.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="facility_name" class="form-label">Nama Fasilitas</label>
            <input type="text" class="form-control @error('facility_name') is-invalid @enderror" id="facility_name" name="facility_name" required autofocus value="{{ old('facility_name') }}" placeholder="Nama Fasilitas">
            @error('facility_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('decription') }}</textarea required placeholder="Deskripsi">
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection