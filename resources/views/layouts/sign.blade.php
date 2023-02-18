@extends('layouts.main')

@section('content')
    <style>
        body{
            background-color: #f5f5f5;
        }

        .main-box{
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
        }

    </style>

    <div class="main-box mt-5">
        <div class="container border-3">
            <div class="row">
                {{-- Kolom Kiri --}}
                <div class="col">
                    @yield('content-sign')
                </div>
                
                {{-- Kolom Kanan (Gambar) --}}
                <div class="col">
                    <img src="https://res.cloudinary.com/practicaldev/image/fetch/s--E93j2cHk--/c_limit%2Cf_auto%2Cfl_progressive%2Cq_66%2Cw_880/https://dev-to-uploads.s3.amazonaws.com/i/4dgtswjdz07d6s9txle6.gif" alt="">
                </div>
            </div>
        </div>
    </div>

@endsection