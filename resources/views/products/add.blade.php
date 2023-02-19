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
        <h1 class = "mt-4" style="color:darkgreen">Add New Product</h1>

        <form action="/products/add" method="post" enctype="multipart/form-data" id="add-product-form">
            @csrf
            <div class="input-box mb-2">
                <label for="name" class="name mb-2">Product Name</label>
                <input type="name" class="form-control mb-2" id="name" name="name" placeholder="Enter product name here..." required>
            </div>

            <div class="input-box mb-2">
                <label for="price" class="name mb-2">Product Price</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Enter product price here..." required>
            </div>

            <div class="input-box mb-2">
                <label for="description" class="name mb-2">Product description</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Enter product description here..." required>
            </div>

            <div class="input-box ">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Product Type</label>
                    <select class="form-select" id="inputGroupSelect01" name="type_id" required>
                      <option value="0" selected >Choose...</option>
                      <option value="1">Book</option>
                      <option value="2">Stationary</option>
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
                    <ul>
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
                <button type="submit" class="btn btn-success border rounded-3 mb-4" id="add-product-btn">Add Product</button>
            </div>

        </form>
    </div>

@endsection