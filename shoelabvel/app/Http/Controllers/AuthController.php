<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');  // <-- Make sure this matches your view location
    }

    // Handle login form submission
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = DB::table('login')->where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Session::put('user_id', $user->id);
                Session::put('user_email', $user->email);
                Session::put('user_name', $user->username ?? $user->name ?? $user->email);

                return redirect('/')->with('success', 'Welkom terug!');
            } else {
                return back()->withErrors(['password' => 'Fout wachtwoord.']);
            }
        } else {
            return back()->withErrors(['email' => 'Email niet gevonden.']);
        }
    }

    // Log out the user
    public function logout()
    {
        Session::flush();
        return redirect('/login')->with('success', 'Je bent uitgelogd.');
    }
}
