@extends('layouts.sign')

@section('content-sign')
    <div class="sign-form align-center">

        <h2 class = "text-center fw-bold mt-5 mb-5">{{ $title }}</h2>
        
        <div class="form-box ms-5 me-5 ps-5 pe-5">
            <form action="/{{ $state }}" method="post">
                @csrf

                <div class="input-box mb-4">
                    <label for="email" class="form-label">Your Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ Cookie::get('remember') ? Cookie::get('email') : "" }}" required>
                </div>

                <div class="input-box mb-4">
                    <label for="password" class="form-label ">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value = {{ Cookie::get('remember') ? Cookie::get('password') : "" }} required>
                </div>
                
                <div class="container mt-4 p-0">
                    <div class="row ">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name = "remember" {{ Cookie::get('remember') ? "checked" : ""}}>
                                <label class="form-check-label" for="flexCheckChecked">Remember Me</label>
                            </div>
                        </div>
                        <div class="col">
                            <p> New Here? <a href="/register">Sign up in here!</a></p>
                        </div>
                    </div>
                </div>
                
                <div class="submit-btn d-flex justify-content-evenly mt-4">
                    <button type="submit" class="btn btn-primary border rounded-3">{{ $title }}</button>
                </div>
                
                {{-- Error --}}
                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul class = "m-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
            </form>
        </div>

    </div>
    
@endsection