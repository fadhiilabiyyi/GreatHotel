@extends('layouts.admin')

@section('container')
    
<h1 class="h2">Edit Kamar</h1>

<div class="col-lg-8">
    <a href="{{ route('rooms.index') }}" class="btn btn-secondary mb-3">Back</a>

    <form action="{{ route('rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="room_type" class="form-label">Tipe Kamar</label>
            <input type="text" class="form-control @error('room_type') is-invalid @enderror" id="room_type" name="room_type" required autofocus value="{{ old('room_type', $room->room_type) }}" placeholder="Tipe Kamar">
            @error('room_type')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="number_of_rooms" class="form-label">Jumlah Kamar</label>
            <input type="number" class="form-control @error('number_of_rooms') is-invalid @enderror" id="number_of_rooms" name="number_of_rooms" required value="{{ old('number_of_rooms', $room->number_of_rooms) }}" placeholder="0">
            @error('number_of_rooms')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="facility_id" class="form-label">Fasilitas</label>
            <select class="form-select" name="facility_id" id="facility_id" required>
                @foreach ($facilities as $facility)
                    @if (old('facility_id', $room->facility_id) == $facility->id)
                        <option value="{{ $facility->id }}" selected>{{ $facility->facility_name }}</option>
                    @else
                        <option value="{{ $facility->id }}">{{ $facility->facility_name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('decription', $room->description) }}</textarea required placeholder="Deskripsi">
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label @error('image') is-invalid @enderror">Foto Kamar</label>
            @if ($room->image)
                <img src="{{ asset('storage/' . $room->image)}}" class="img-preview img-fluid mb-3 col-sm-6 d-block">
            @else
                <img class="img-preview img-fluid mb-3 col-sm-6">
            @endif
            <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
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