<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login; // jouw model
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Toon registratieformulier
    public function showForm()
    {
        return view('register'); // zorg dat je resources/views/register.blade.php hebt
    }

    // Verwerk registratie
    public function register(Request $request)
    {
        
       // dd("Hallo1");
    
        // Valideer input
     /*     $request->validate([
            'username' => 'required|string|max:255|unique:login,username',
            'email' => 'required|email|max:255|unique:login,email',
            'password' => 'required|string|confirmed|min:8',
            'phone' => 'required|string|max:20',
            'adress' => 'required|string|max:255',
            'postal' => ['required', 'regex:/^[1-9][0-9]{3}\s?[A-Z]{2}$/i'],
        ]);*/
     //   dd($request->all());
        // Maak nieuwe gebruiker aan
        Login::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'adress' => $request->adress,
            'postal' => strtoupper(str_replace(' ', '', $request->postal)),
        ]);

        // Redirect naar login met succesmelding
        return redirect()->route('login')->with('success', 'Registratie gelukt! Je kunt nu inloggen.');
    }
}
