<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Log in</title>
    <link rel="stylesheet" href="{{ asset('css/contact2.css') }}">
</head>
<body>

@if($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div style="color:green;">
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

</body>
</html>
