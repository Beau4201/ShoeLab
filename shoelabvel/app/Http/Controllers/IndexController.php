<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
     public function index()
    {
        $products = Product::all();
        // var_dump($products); // Debugging line to check products
        return view('index' , compact('products'));  // If your blade file is index.blade.php
    }
}
