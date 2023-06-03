@extends('layouts.main')

@section('content')

    <style>
        .container{
            height: 100%
        }
    </style>

    <div class="main-content" style="margin-block: 15vh">
        <div class="about-content d-flex justify-content-around align-items-center">
            <div class="content-left">
                <h3 class="d-flex align-items-center">Jramedia</h3>
                <p>We provide our customer with the best product quality</p>
            </div>
    
            <div class="content-right" >
                <img src="{{  asset('images\book.jpg') }}" alt="" srcset="" width="70%">
            </div>
        </div>
    </div>
@endsection