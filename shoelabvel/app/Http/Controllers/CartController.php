<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        return view('bestellenenretour', ['cart' => $cart]);
    }

    public function add(Request $request)
    {
        $cart = Session::get('cart', []);
        $cart[] = [
            'id' => uniqid(),
            'name' => $request->input('name', 'Nieuw Item'),
            'quantity' => $request->input('quantity', 1),
        ];
        Session::put('cart', $cart);
        return response()->json($cart);
    }

    public function update(Request $request)
    {
        $cart = Session::get('cart', []);
        foreach ($cart as &$item) {
            if ($item['id'] == $request->input('id')) {
                $item['name'] = $request->input('name', $item['name']);
                $item['quantity'] = $request->input('quantity', $item['quantity']);
            }
        }
        Session::put('cart', $cart);
        return response()->json($cart);
    }

    public function remove(Request $request)
    {
        $cart = Session::get('cart', []);
        $cart = array_filter($cart, fn($item) => $item['id'] !== $request->input('id'));
        Session::put('cart', $cart);
        return response()->json($cart);
    }
}