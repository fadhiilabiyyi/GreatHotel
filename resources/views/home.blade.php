@extends('layouts.home')

@section('container')
<div class="py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="assets/app-img/home02.jpg" class="d-block mx-lg-auto img-fluid" alt="Hotel Image 02" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h2 class="display-5 fw-bold lh-1 mb-3">Tentang Kami</h2>
            <p class="lead">Lepaskan diri Anda ke Hotel Hebat, dikelilingi oleh keindahan pegunungan yang indah, danau, dan sawah menghijai. Nikmati sore yang hangat dengan berenang di kolam renang dengan pemandangan matahari terbenam yang memukau; Kid's Club yang luas - menawarkan beragam fasilitas dan kegiatan anak-anak yang melengkapi kenyamanan keluarga.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a href="register" class="btn btn-primary btn-lg px-4 me-md-2">Daftar</a>
                <a href="login" class="btn btn-outline-secondary btn-lg px-4">Login</a>
            </div>
      </div>
    </div>
</div>
@endsection