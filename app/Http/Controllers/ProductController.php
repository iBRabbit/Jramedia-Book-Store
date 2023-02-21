<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products/index', [
            'title' => 'Product',
            'active' => 'products',
            // All products and paginate
            'products' => Product::paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');
        return view('products/create', [
            'title' => 'Add Product',
            'header' => 'Add new product',
            'active' => 'products'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('admin');
        $product = $request->validate([
            'name' => 'required|min:5',
            'price' => 'required|numeric|min:1000',
            'description' => 'required|min:5',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:15000',
            'type_id' => 'required|not_in:0'
        ]);
        
        $product['image'] = $request->file('image')->store('product-images', 'public');

        Product::create($product);
        return redirect('/products')->with('success', 'Product successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->authorize('admin');
        return view('products/edit', [
            'title' => 'Edit Product',
            'header' => 'Update Product Form',
            'active' => 'products',
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->authorize('admin');
        // Delete image 
        if($product->image)
            Storage::disk('public')->delete($product->image);

        Product::destroy($product->id);
        return redirect('/products')->with('success', 'Product successfully deleted!');
    }
}
