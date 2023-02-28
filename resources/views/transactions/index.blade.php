@extends('layouts.main')

@section('content')
    <div class="transaction-container">

        <h1 class="text-center mt-4 mb-4" style="color:rgba(3, 131, 122, 0.597)">Transaction History</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">Transaction Date</th>
                    <th scope="col">Username</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <th scope="row">{{ $transaction->uuid }}</th>
                        <td>{{ $transaction->created_at }}</td>
                        <td>{{ $transaction->user->name}}</td>
                        <td>{{ $transaction->product->name }}</td>
                        <td>{{"Rp " . number_format($transaction->product->price) }}</td>
                        <td>{{ $transaction->quantity}}</td>
                        <td>{{ "Rp " . number_format($transaction->quantity * $transaction->product->price)}}</td>
                    </tr>
                @endforeach
            </tbody>

            
        </table>
        <div class="paginate-box d-flex justify-content-center">
            {{ $transactions->links()}}
        </div>
    </div>
@endsection     
