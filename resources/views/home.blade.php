@extends('layouts.main')

@section('content')
    <style>
        .content-box {
            /* border: 3px solid red; */
            border-radius: 10px;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2);
            background-color: #f5f5f5eb;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
    </style>
    <div class="content-box mt-5 mb-5 d-flex flex-column" >
        <img src="{{ asset('images\reading-challenge-hero.jpg') }}" alt="" class = "p-3 m-3" width="95%">
        <p style ="position:absolute; font-weight: bold; color:white; font-size:2rem; bottom:30%">We provide all of your books and stationary needs</p>
    </div>
@endsection