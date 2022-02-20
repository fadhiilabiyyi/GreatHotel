@extends('layouts.login')

@section('container')
<div class="container col-xl-10 col-xxl-8">
    <div class="row align-items-center py-5">
        <h2 class="text-center mb-4">Register</h2>
        <div class="col-lg-10 mx-auto col-lg-5">
            <form action="{{ route('store') }}" method="POST" class="p-4 p-md-5 border rounded-3 bg-light" autocomplete="off">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="name" value="{{ old('name') }}" autofocus required>
                    <label for="name">Name</label>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" required>
                    <label for="username">Username</label>
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                <hr class="my-4">
                <div class="text-center">
                    <small class="text-muted text-center">Already registered? <a href="/register">Login!</a></small>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection