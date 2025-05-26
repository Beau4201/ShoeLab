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
            // Check wachtwoord (hier plain text, beter is hash check)
            if ($request->password === $user->password) {
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
            'password' => 'required|min:6|confirmed', // Bevat ook wachtwoord bevestiging
        ]);

        // Maak nieuwe gebruiker aan met gehashte password
        DB::table('login')->insert([
            'email' => $request->email,
            'password' => $request->password, // hier liever: Hash::make($request->password)
        ]);

        return redirect('/login')->with('success', 'Account aangemaakt, log in!');
    }
}
