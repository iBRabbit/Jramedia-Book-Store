@extends('layouts.main')

@section('content')

    <div class="product-container d-flex flex-column">
        <h3 class = "text-center mt-4">Our Products</h3>
        
        <div class="add-product-btn d-flex justify-content-center">
             
            <a href="/products/add"><button type="button" class="btn btn-success"> Add Product </button> </a>
          
        </div>
    </div>

@endsection