@extends('layouts.main')

@section('content')

    <div class="accounts-container d-flex flex-column">

        <h1 class="text-center mt-4 mb-4" >Accounts</h1>

        <div class="user-box d-flex flex-column justify-content-center" style="margin-inline:30%">
            @foreach ($users as $user)
            <div class="card mb-3" >
                <div class="row g-0">
                    <div class="col-md-10">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="card-text">{{ $user->email }}</p>
                            <p class="card-text fw-bold" style="color:darkorange">{{ $user->isAdmin ? 'admin' : 'customer' }}</p>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <a href="#" class="btn btn-primary d-flex align-items-center justify-content-center" style="width:100%; height:50%" >Edit</a>

                        <form action="/users/{{ $user->id }}" method="POST" style="width:100%;height:50%;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="width: 100%; height:100%;">Delete</button>
                        </form>
                    </div>

                </div>
            </div>
        @endforeach
        <div class="pagination-nav d-flex justify-content-center">
            {{ $users->links() }}
        </div>
        </div>


    </div>
@endsection
