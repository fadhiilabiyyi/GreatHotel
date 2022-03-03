@extends('layouts.admin')

@section('container')

<h1 class="h2">Data Kamar</h1>

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
                <th>Tipe Kamar</th>
                <th>Jumlah Kamar</th>
                <th>Fasilitas</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
            <tr>
                <td>{{ ++$i }}</td>
                <td><a href="{{ route('rooms.show', $room->id) }}">{{ $room->room_type }}</a></td>
                <td>{{ $room->number_of_rooms }}</td>
                <td>{{ $room->facility->facility_name }}</td>
                <td><img src="{{ asset('storage/' . $room->image) }}" alt="Gambar Kamar {{ $room->room_type }}" width="50" class="img-fluid"></td>
                <td>
                    <a href="{{ route('rooms.edit', $room->id) }}" class="badge bg-warning" onclick="return confirm('Apakah Anda Yakin?')">
                        <span>Edit</span></a>

                        <form action="{{ route('rooms.destroy', $room->id) }}" method="post" class="d-inline">
                            
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
        <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-3">Create new Kamar</a>
    </div>

    {{ $rooms->links() }}
</div>

@endsection