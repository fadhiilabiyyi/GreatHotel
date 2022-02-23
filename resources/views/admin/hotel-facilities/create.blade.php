@extends('layouts.admin')

@section('container')
    
<h1 class="h2">Create Fasilitas Hotel</h1>

<div class="col-lg-8">
    <a href="{{ route('hotel-facilities.index') }}" class="btn btn-secondary mb-3">Back</a>

    <form action="{{ route('hotel-facilities.store') }}" method="POST" enctype="multipart/form-data">
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
        <div class="mb-3">
            <label for="image" class="form-label @error('image') is-invalid @enderror">Foto Fasilitas Hotel</label>
            <img class="img-preview img-fluid mb-3 col-sm-6">
            <input class="form-control" type="file" id="image" name="image" required onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>
        <button type="submit" class="btn btn-primary mb-3">Submit</button>
    </form>
</div>

@endsection