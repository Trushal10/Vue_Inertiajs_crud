<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return inertia('Product/Index',[
            'products' => $products
        ]);
    }

    public function create()
    {
        return inertia('Product/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|string|max:255',
            'price' =>'required|numeric'
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price
        ]);

        return redirect()->to('product')->with('message','product created successfully');
    }
    public function show(product $product)
    {
        return inertia('Product/Show',[
            'product' => $product
        ]);
    }

    public function edit(product $product)
    { 
        return inertia('Product/Edit',[
            'product' => $product
        ]); 
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' =>'required|string|max:255',
            'price' =>'required|numeric'
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
        return redirect()->to('product')->with('message','product updated successfully');
    }
    public function destroy(Product $product)
    { 
        $product->delete();
        return redirect()->to('product')->with('message','product deleted successfully');
    }
}
