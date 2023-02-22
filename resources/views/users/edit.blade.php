@extends('layouts.form')

@section('content-form')
<form action="/users/{{ $user->id }}" method="post" enctype="multipart/form-data" id="edit-user-form">
    @csrf
    @method('put')
    <div class="input-box mb-2">
        <label for="name" class="name mb-2">User Name</label>
        <input type="name" class="form-control mb-2" id="name" name="name" value="{{ old('name', $user -> name) }}" required> 
    </div>

    <div class="input-box mb-2">
        <label for="email" class="name mb-2">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user -> email) }}" required>
    </div>

    <div class="input-box mb-2">
        <label for="password" class="name mb-2">Password</label>
        <input type="password" class="form-control" id="password" name="password"  " required>
    </div>

    <div class="input-box ">
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">User Role</label>
            <select class="form-select" id="inputGroupSelect01" name="isAdmin" required>
              <option value="-1" >Choose...</option>
              <option value="0" {{ !(old('isAdmin', $user -> isAdmin)) ? "selected" : ""}}>Customer</option>
              <option value="1" {{ (old('isAdmin', $user -> isAdmin)) ? "selected" : ""}}>Admin</option>
            </select>
          </div>
    </div>

    {{-- Error Message --}}
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul class="m-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Success Message --}}
    @if(session() -> has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="submit-btn d-flex justify-content-evenly mt-4" >
        <button type="submit" class="btn btn-success border rounded-3 mb-4" id="add-user-btn">Update user</button>
    </div>

</form>
@endsection