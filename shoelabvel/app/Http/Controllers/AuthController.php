<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Login pagina tonen
    public function showLoginForm()
    {
        return view('login');
    }

    // Login actie afhandelen
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = DB::table('login')->where('email', $request->email)->first();

        if ($user) {
            // ✅ Gebruik Hash::check om gehashte wachtwoorden te vergelijken
            if (Hash::check($request->password, $user->password)) {
                Session::put('user_id', $user->id);
                Session::put('user_email', $user->email);

                return redirect('/')->with('success', 'Welkom terug!');
            } else {
                return back()->withErrors(['password' => 'Fout wachtwoord.']);
            }
        } else {
            return back()->withErrors(['email' => 'Email niet gevonden.']);
        }
    }

    // Register pagina tonen
    public function showRegisterForm()
    {
        return view('register');
    }

    // Register actie afhandelen
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:login,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // ✅ Sla wachtwoord veilig op met Hash::make
        DB::table('login')->insert([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/login')->with('success', 'Account aangemaakt, log in!');
    }
}
