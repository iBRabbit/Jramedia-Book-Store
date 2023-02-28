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
                    <img src="{{ asset('storage\images\login-image.gif') }}" alt="">
                </div>
            </div>
        </div>
    </div>

@endsection