<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'ShoeLab')</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F5F5F5;
            color: #333;
        }

        /* Header styles */
        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #000;
            padding: 10px 20px;
            color: white;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo-circle {
            height: 50px;
            width: 50px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 15px;
        }

        .promo-text {
            font-size: 1rem;
        }

        .burger-icon {
            font-size: 26px;
            cursor: pointer;
        }

        /* Side navigation */
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.3s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 10px 20px;
            text-decoration: none;
            font-size: 18px;
            color: #ddd;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            background-color: #333;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 15px;
            font-size: 30px;
            margin-left: 50px;
        }

        /* Container for page content */
        .container {
            max-width: 450px;
            margin: 60px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        /* Form styles */
        input.feedback-input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #000;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #333;
        }

        p.reg, p.home {
            text-align: center;
            margin-top: 15px;
            font-size: 0.9rem;
        }

        p.reg a, p.home a {
            color: #000;
            text-decoration: none;
            font-weight: 600;
        }

        p.reg a:hover, p.home a:hover {
            text-decoration: underline;
        }

        .message-box {
            padding: 15px 20px;
            border-radius: 8px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .message-error {
            background-color: #ffd6d6;
            color: #900;
            border: 1px solid #900;
        }

        .message-success {
            background-color: #d6ffd8;
            color: #090;
            border: 1px solid #090;
        }
    </style>

    @yield('head')
</head>
<body>

    <header class="top-header">
        <div class="logo-container">
            <img src="{{ asset('img/IMG-20250509-WA0000.jpg') }}" alt="ShoeLab logo" class="logo-circle">
            <span class="promo-text">Shop NU! 50% korting op je eerste paar schoenen!</span>
        </div>
        <span class="burger-icon" onclick="openNav()">&#9776;</span>
    </header>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="{{ route('login') }}">Log in</a>
        <form action="{{ route('search') }}" method="GET" style="padding: 10px;">
            <input type="text" name="q" id="searchInput" placeholder="Zoek een product" onkeyup="liveFilter()" style="width: 100%; padding: 10px; margin-top: 10px;">
        </form>
        <a href="{{ url('contact') }}">Contact</a>
        <a href="{{ url('soortenschoenen') }}">Soorten schoenen</a>
        <a href="#over">Over ons</a>
        <a href="#products">Producten</a>
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
