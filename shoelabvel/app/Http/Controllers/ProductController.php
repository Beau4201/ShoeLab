<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    

    public function index()
    {
        $products = Product::all();
        // var_dump($products); // Debugging line to check products
        return view('products', compact('products'));  // If your blade file is index.blade.php
    }



    // Show all products
    public function showProducts()
    {
        $products = Product::all(); // get all products from DB 
        // dd($products);
        return view('products', compact('products'));  // send products to view
    }

    // Show form to create a product
    public function create()
    {
        // return view('create');
        $products = Product::all(); // get all products from DB 
        // dd($products);
        return view('create', compact('products'));  // send products to view
    }

    // Store new product in DB
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|gt:0',
            'description' => 'nullable|string',
        ]);

        // Create product
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);
        return redirect()->route('products.index')->with('success', 'Product toegevoegd!');

    }


}
