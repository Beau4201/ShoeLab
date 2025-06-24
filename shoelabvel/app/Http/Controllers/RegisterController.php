<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Toon registratieformulier
    public function showForm()
    {
        return view('auth.register');
    }

    // Verwerk registratie
    public function register(Request $request)
    {
        // Validatie (optioneel, maar aanbevolen)
        $request->validate([
            'username' => 'required|string|max:255|unique:login,username',
            'email' => 'required|email|max:255|unique:login,email',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:20',
            'adress' => 'required|string|max:255',
            'postal' => ['required', 'regex:/^[1-9][0-9]{3}\s?[A-Z]{2}$/i'],
        ]);

        // Nieuwe gebruiker aanmaken
        Login::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'adress' => $request->adress,
            'postal' => strtoupper(str_replace(' ', '', $request->postal)),
        ]);

        return redirect()->route('login')->with('success', 'Registratie gelukt! Je kunt nu inloggen.');
    }
}
