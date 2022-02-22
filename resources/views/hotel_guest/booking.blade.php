@extends('layouts.hotel_guest')

@section('container')
    
<div class="container-fluid mt-4 mb-5 row">
    <div class="col-sm-12">
        <h2 class="mb-4">Form Pemesanan</h2>

        <form action="" method="">
            <div class="mb-3">
                <label for="order_name" class="form-label text-dark">Nama Pemesan</label>
                <input type="text" class="form-control" id="order_name" name="order_name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label text-dark">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="telephone" class="form-label text-dark">No Telephone</label>
                <input type="text" class="form-control" id="telephone" name="telephone">
            </div>
            <div class="mb-3">
                <label for="id_room" class="form-label text-dark">Tipe Kamar</label>
                <select class="form-select mb-3" id="id_room" name="id_room">
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary float-end">Konfirmasi Pesanan</button>
        </form>
    </div>    
</div>    

@endsection