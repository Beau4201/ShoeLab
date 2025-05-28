<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Haal alle producten op en stuur ze naar de hoofdpagina
    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }

    // Zoekfunctie voor producten
    public function search(Request $request)
    {
        $query = $request->input('q');

        if (!$query) {
            return redirect()->route('home');
        }

        $products = Product::where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->get();

        return view('index', compact('products'));
    }
}
