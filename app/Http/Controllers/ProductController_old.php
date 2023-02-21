<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('products/index', [
            'title' => 'Product',
            'active' => 'products',
            // All products and paginate
            'products' => Product::paginate(3)
        ]);
    }

    public function add() {
        return view('products/create', [
            'title' => 'Add Product',
            'active' => 'products'
        ]);
    }

    public function store(Request $request) {
        $product = $request->validate([
            'name' => 'required|min:5',
            'price' => 'required|numeric|min:1000',
            'description' => 'required|min:5',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:15000',
            'type_id' => 'required|not_in:0'
        ]);
        
        $product['image'] = $request->file('image')->store('product-images', 'public');

        Product::create($product);
        return redirect('/products/')->with('success', 'Product successfully added!');
    }
    
    public function delete(Product $product) {
        Product::destroy($product->id);
        return redirect('/products')->with('success', 'Product successfully deleted!');
    }
}
