<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use Ramsey\Uuid\Uuid;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart/index', [
            'title' => 'Cart',
            'active' => '',
            'carts' => Cart::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    public function addCart(Product $product) {
        $query = Cart::where('user_id', auth()->user()->id)
        ->where('product_id', $product->id)
        ->get();

        if($query->count() > 0) {
            return redirect('/products/')->with('error', 'Product already in cart!');
        }

        Cart::create([
            'user_id' => auth()->user()->id,
            'product_id' => $product->id,
            'quantity' => 1
        ]);

        return redirect('/products/')->with('success', 'Product successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {

        $validatedData = $request->validate([
            'quantity' => 'required|numeric|min:1'
        ]);

        if(!$validatedData)
            return redirect('/cart')->with('error', 'Please enter the correct value');

        Cart::where('id', $cart->id)->update($validatedData);
        return redirect('/cart')->with('success', 'Cart successfully updated!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        Cart::destroy($cart->id);
        return redirect('/cart/')->with('success', 'Cart successfully deleted!');
    }

    public function checkout() {
        // dd("masuk");
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        
        foreach($carts as $cart) {
            Transaction::create(
                [
                    'user_id' => auth()->user()->id,
                    'uuid' => Uuid::uuid4()->toString(),
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity
                ]
            );
            $cart->destroy($cart->id);
        }

        return redirect('/cart/')->with('success', 'Checkout successfully!');   
    }
}
