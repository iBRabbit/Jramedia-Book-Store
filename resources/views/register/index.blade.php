@extends('layouts.sign')

@section('content-sign')
    <div class="sign-form align-center">

        <h2 class = "text-center fw-bold mt-5 mb-5">{{ $title }}</h2>
        
        <div class="form-box ms-5 me-5 ps-5 pe-5">
            <form action="/{{ $state }}" method="post">
                @csrf

                <div class="input-box mb-4">
                    <label for="name" class="form-label ">Your Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                
                <div class="input-box mb-4">
                    <label for="email" class="form-label ">Your Email</label>
                    <input type="text" class="form-control" id="email" name="email"email" required>
                </div>

                <div class="input-box mb-4">
                    <label for="password" class="form-label ">Password</label>
                    <input type="password" class="form-control" id="password" name="password"  required>
                </div>

                <p class = "text-center mb-4"> Already have an account? <a href="/login">Login in here!</a></p>
                
                <div class="submit-btn d-flex justify-content-evenly">
                    <button type="submit" class="btn btn-primary border rounded-3">{{ $title }}</button>
                </div>

                {{-- Error --}}
                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
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