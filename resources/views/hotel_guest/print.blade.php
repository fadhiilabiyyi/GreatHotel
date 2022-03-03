<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struk Reservasi Kamar</title>
</head>
<body>
    <div class="mt-3 card">
        <div class="card-header">
            <h1>{{ 'ID Registrasi : ' . $id }}</h1>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $order_name }}</h5>
            <p class="card-text">
                Email : {{ $email }} <br>
                No Telp : {{ $telephone }} <br>
                Kamar : {{ $room_type }}
            </p>
            <p class="card-text">
                Informasi Reservasi <br>
                Tanggal Check In : {{ $check_in }} <br>
                Tanggal Check Out : {{ $check_in }} <hr>
                Status : 
                @switch($status)
                    @case('check_in')
                        <strong>Check In</strong>
                        @break
                    @case('check_out')
                        <strong>Check Out</strong>
                        @break
                    @default
                        <strong>Booking</strong>
                @endswitch 
            </p>
        </div>
    </div>      
</body>
</html>