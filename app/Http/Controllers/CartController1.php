<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{

    public function index() {
        return view('cart/index', [
            'title' => 'Cart',
            'active' => '',
            'carts' => Cart::where('user_id', auth()->user()->id)->get()
        ]);
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

        return redirect('/products/')->with('success', 'Product successfully deleted!');
    }

    public function store(Product $product) {
        
        
    }

    public function update(Request $request, Cart $cart) {
        dd($request);
        $cart->update([
            'quantity' => $request->quantity
        ]);

        return redirect('/cart')->with('success', 'Cart successfully updated!');
    }
}
