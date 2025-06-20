<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Display all products with optional sorting
    public function index(Request $request)
    {
        $sort = $request->query('sort');
        $products = Product::query();

        switch ($sort) {
            case 'name':
                $products->orderBy('name');
                break;
            case 'price':
                $products->orderBy('price');
                break;
            case 'date':
                $products->orderBy('created_at', 'desc');
                break;
            default:
                $products->orderBy('created_at', 'desc');
        }

        return view('products', [
            'products' => $products->get()
        ]);
    }

    // Optional: fallback method
    public function showProducts()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    // Show form to create product
    public function create()
    {
        return view('create');
    }

    // Store new product with image upload
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|gt:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public'); // stored in storage/app/public/products
        }

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('products')->with('success', 'Product toegevoegd!');
    }
}
