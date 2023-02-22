@extends('layouts.form')

@section('content-form')
<form action="/products/{{ $product->id }}" method="post" enctype="multipart/form-data" id="add-product-form">
    @csrf
    @method('put')
    <div class="input-box mb-2">
        <label for="name" class="name mb-2">Product Name</label>
        <input type="name" class="form-control mb-2" id="name" name="name" value="{{ old('name', $product -> name) }}" required> 
    </div>

    <div class="input-box mb-2">
        <label for="price" class="name mb-2">Product Price</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $product -> price) }}" required>
    </div>

    <div class="input-box mb-2">
        <label for="description" class="name mb-2">Product description</label>
        <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $product -> description) }}" required>
    </div>

    <div class="input-box ">
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Product Type</label>
            <select class="form-select" id="inputGroupSelect01" name="type_id" required>
              <option value="0" >Choose...</option>
              <option value="1" {{ (old('type_id', $product -> type_id) == 1) ? "selected" : ""}}>Book</option>
              <option value="2" {{ (old('type_id', $product -> type_id) == 2) ? "selected" : ""}}>Stationary</option>
            </select>
          </div>
    </div>

    <div class="input-box mb-2">
        <label for="image" class="name mb-2">Product Image</label>
        <input class="form-control" type="file" id="image" name="image">

        
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
        <button type="submit" class="btn btn-success border rounded-3 mb-4" id="add-product-btn">Update Product</button>
    </div>

</form>
@endsection