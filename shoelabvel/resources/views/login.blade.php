@extends('layouts.app')`

@section('applayout.css')
    <link rel="stylesheet" href="{{ asset('css/applayout.css') }}">
@endsection

@section('title', 'Log in')

@section('content')

    @if($errors->any())
        <div class="message-box message-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="message-box message-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <input name="email" type="text" class="feedback-input" placeholder="Email" required />
        <input name="password" type="password" class="feedback-input" placeholder="Wachtwoord" required />
        <input type="submit" value="LOG IN" />
    </form>

    <p class="reg">Nog geen account? <a href="{{ route('register.form') }}">Registreer hier</a></p>
    <p class="home">Terug naar <a href="{{ url('/') }}">Home</a></p>

@endsection
