@extends('layouts.main')

@section('content')

    <style>
        .add-box {
            /* border: 3px solid red; */
            border-radius: 10px;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2);
            background-color: #f5f5f5eb;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #add-product-form {
            width: 70%;
        }

        #add-product-btn{
            width: 100%;
        }

    </style>

    <div class="add-box mt-5 d-flex flex-column">
        <h1 class = "mt-4" style="color:darkgreen">{{ $header }}</h1>

        @yield('content-form')
    </div>

@endsection