<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'ShoeLab')</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
        /* ... your CSS as before ... */
        .top-header {
            position: fixed;
            top: 0; left: 0;
            width: 100vw;
            height: 60px;
            background-color: #111827;
            color: #F9FAFB;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            box-sizing: border-box;
            z-index: 1000;
            font-family: 'Poppins', sans-serif;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
            margin: 0;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .promo-text {
            font-weight: 600;
            font-size: 1rem;
            white-space: nowrap;
        }

        .burger-icon {
            font-size: 1.8rem;
            cursor: pointer;
            user-select: none;
            color: #F9FAFB;
            padding: 8px;
            transition: color 0.2s ease;
        }

        .burger-icon:hover {
            color: #10B981;
        }

        /* Side Navigation */
        .sidenav {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 0;
            background-color: #111827;
            overflow-x: hidden;
            transition: width 0.3s ease;
            padding-top: 60px;
            z-index: 1100;
        }

        .sidenav.open {
            width: 250px;
        }

        .sidenav a {
            padding: 12px 24px;
            text-decoration: none;
            font-size: 1.1rem;
            color: #F9FAFB;
            display: block;
            transition: background-color 0.2s;
        }

        .sidenav a:hover {
            background-color: #10B981;
            color: white;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 2rem;
            color: #F9FAFB;
            cursor: pointer;
            user-select: none;
            transition: color 0.2s ease;
        }

        .sidenav .closebtn:hover {
            color: #10B981;
        }

        .sidenav form {
            padding: 0 24px 15px;
        }

        .sidenav input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: none;
            font-size: 1rem;
            outline: none;
        }

        main.container {
            margin-top: 80px;
            padding: 20px;
            font-family: 'Poppins', sans-serif;
        }
    </style>

    @yield('head')
</head>
<body>
    <header class="top-header">
        <div class="logo-container">
            <img src="{{ asset('img/logosb.png') }}" alt="ShoeLab logo" class="logo-circle">
            <span class="promo-text">Shop NU! 50% korting op je eerste paar schoenen!</span>
        </div>

        <span class="burger-icon" onclick="openNav()">&#9776;</span>
    </header>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        @auth
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-sidenav').submit();">Uitloggen</a>
            <form id="logout-form-sidenav" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>
        @else
            <a href="{{ route('login') }}">Inloggen</a>
            <a href="{{ route('register') }}">Registreren</a>
        @endauth

        <form action="{{ route('search') ?? '#' }}" method="GET" style="padding: 10px;">
            <input type="text" name="q" id="searchInput" placeholder="Zoek een product" onkeyup="liveFilter()" style="width: 100%; padding: 10px; margin-top: 10px;">
        </form>

        <a href="{{ url('contact') }}">Contact</a>
        <a href="{{ url('soortenschoenen') }}">Soorten schoenen</a>
        <a href="#over">Over ons</a>
        <a href="{{ url('products') }}">Producten</a>
        <a href="{{ url('privacy') }}">Privacyverklaring</a>
    </div>

    <main class="container">
        @yield('content')
    </main>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }

        function liveFilter() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            const elements = document.querySelectorAll(".searchable");

            elements.forEach(el => {
                if (el.innerText.toLowerCase().includes(input)) {
                    el.style.display = "block";
                } else {
                    el.style.display = "none";
                }
            });
        }
    </script>

    @yield('scripts')
</body>
</html>
