@extends('layouts.main')

@section('content')
    <div class="cart-container d-flex flex-column justify-content-center">
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
                    {{-- {{dd($cart) }} --}}
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $cart->product->name }}</td>
                        <td>{{ 'Rp ' . $cart->product->price }}</td>
                        <td>{{ $cart->product->description }}</td>
                        <td>
                            <form action="/cart/{{ $cart->id }}" method="post" id="form-{{ $cart->id }}">
                                @csrf
                                @method('put')
                                <input type="number" name="quantity" value="{{ $cart->quantity }}"
                                    form="form-{{ $cart->id }}" style="width:70%";>
                                <button type="submit" class="btn btn-success" form="form-{{ $cart->id }}"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg></button>
                            </form>

                        </td>
                        <td>{{ 'Rp ' . $cart->product->price * $cart->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        <div class="btn-container d-flex justify-content-center">
            <button type="submit" class="btn btn-success mt-auto" form="form-1">Checkout</button>
        </div>


    </div>
@endsection
