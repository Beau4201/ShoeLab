@extends('layouts.app')

@section('title', 'Registreren')
@section('head') {{-- Deze moet overeenkomen met je layout --}}
    <link rel="stylesheet" href="{{ asset('css/applayout.css') }}">
@endsection
@section('content')
<div style="max-width: 400px; margin: 50px auto; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
    <h2 style="text-align: center; margin-bottom: 20px;">Registreren</h2>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul style="padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div style="color: green; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required
            style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;">
        
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required
            style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;">

        <input type="password" name="password" placeholder="Password" required
            style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;">

        <input type="password" name="password_confirmation" placeholder="Confirm password" required
            style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;">

        <input type="text" name="phone" placeholder="Phone number" value="{{ old('phone') }}" required
            style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;">

        <input type="text" name="adress" placeholder="Adress" value="{{ old('adress') }}" required
            style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;">

        <input type="text" name="postal" placeholder="Postal code" value="{{ old('postal') }}" required
            style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">

        <button type="submit"
            style="width: 100%; padding: 12px; background-color: #000; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: 600;">
            Register
        </button>
    </form>

    <p style="text-align: center; margin-top: 15px;">
        Heb je al een account? <a href="{{ route('login') }}" style="color: #000; text-decoration: underline;">Login hier</a>
    </p>
</div>
@endsection
