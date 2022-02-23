@extends('layouts.admin')

@section('container')

<h1 class="h2">Data Fasilitas Kamar</h1>

@if (session()->has('success'))
        <div class="alert alert-success col-lg-12" role="alert">
            {{ session('success') }}
        </div>
    @endif

<div class="table-responsive col-lg-12">
    <table class="table table-sm table-bordered table-hover border-dark text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Fasilitas</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($room_facilities as $room_facility)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $room_facility->facility_name }}</td>
                <td>{{ $room_facility->description }}</td>
                <td><img src="{{ asset('storage/' . $room_facility->image) }}" alt="Gambar {{ $room_facility->facility_name }}" width="50" class="img-fluid"></td>
                <td>
                    <a href="{{ route('room-facilities.edit', $room_facility->id) }}" class="badge bg-warning" onclick="return confirm('Apakah Anda Yakin?')">
                        <span>Edit</span></a>

                        <form action="{{ route('room-facilities.destroy', $room_facility->id) }}" method="post" class="d-inline">
                            
                            @method('delete')
                            @csrf

                            <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Menghapus Data Ini Akan Mempengaruhi Data Lain, Anda Yakin?')"><span>Delete</span></button>

                        </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-end">
        <a href="{{ route('room-facilities.create') }}" class="btn btn-primary mb-3">Create new Fasilitas Kamar</a>
    </div>

    {{ $room_facilities->links() }}
</div>

@endsection