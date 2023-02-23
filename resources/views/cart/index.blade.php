@extends('layouts.main')

@section('content')
    <div class="cart-container d-flex flex-column justify-content-center">
        <form action="/" method="post" id="form-1">
            @csrf
            <h1 class="text-center fw-bold">My Cart</h1>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Description</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $cart)
                        <tr>
                            <th scope="row">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" form="form-1">
                                    <label class="form-check-label" for="flexCheckDefault">
    
                                    </label>
                                </div>
                            </th>
                            <td>{{ $cart->product->name }}</td>
                            <td>{{ 'Rp ' . $cart->product->price }}</td>
                            <td>{{ $cart->product->description }}</td>
                            <td>
                                <div class="container">
                                    <div class="row">
                                        {{-- <form action="/cart/{{ $cart->product->id }}" method="post" class=" d-flex flex-row justify-content-space-between" id="form-2">
                                            @csrf
                                            @method('get')
                                            <div class="col m-0 p-1">
                                                <input type="text" value="{{ $cart->quantity }}" form="form-2"> 
                                            </div>

                                            <div class="col m-0 p-1 ">
                                                <button type="submit" class="btn btn-success" class="m-0 p-0" form="form-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </form> --}}
                                    </div>
                                </div>
                            </td>
                            <td>{{ 'Rp ' . $cart->quantity * $cart->product->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    
            
            <div class="btn-container d-flex justify-content-center">
                <button type="submit" class="btn btn-success mt-auto" form="form-1">Checkout</button>
            </div>
                
        </form>

        
    </div>
@endsection
