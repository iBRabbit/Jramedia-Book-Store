@extends('layouts.main')

@section('content')
    <div class="product-container d-flex flex-column">
        <h3 class="text-center mt-4">Our Products</h3>
        
        {{-- Messages --}}
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif

        @if (Auth::user() -> isAdmin)
            <div class="add-product-btn d-flex justify-content-center">
                <a href="/products/create"><button type="button" class="btn btn-success"> Add Product </button> </a>
            </div>
        @endif
        
        <div class="product-list-container mt-3 ">
            <div class="container d-flex justify-content-center" >
                @foreach ($products->chunk(3) as $chunk)
                    @foreach ($chunk as $product)
                        <div class="container ms-1 me-1 border" style="width:15vw">
                            <div class="row mb-2">
                                <div class="col m-0 p-0">
                                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top"
                                        alt="{{ $product->name }}" height="200rem">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text" style="color:goldenrod">
                                        {{ 'Rp. ' . $product->price }}</p>
                                    <p class="card-text">{{ $product->description }}</p>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col">
                                    @if (Auth::user()->isAdmin)
                                        <div class="action-center-box d-flex flex-row">
                                            <form action="/products/{{ $product->id }}/edit" method="post"></form>
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Edit</button>
                                            </form>
    
                                            <form action="/products/{{ $product->id }}" method="post" class = "ms-2">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>                                     
                                            </form>

                                        </div>
                                    @else
                                        <a href="" class="btn btn-success">Add to cart</a>
                                    @endif
                                </div>
                            </div>

                        </div>
                    @endforeach
                @endforeach
            </div>

            <div class="paginate-box d-flex justify-content-center mt-4">
                {{ $products->links() }}
            </div>

        </div>


    </div>
@endsection
