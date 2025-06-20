<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'ShoeLab')</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
    .top-header {
    position: fixed;      /* vastplakken aan top */
    top: 0;
    left: 0;
    width: 100vw;         /* volledige schermbreedte */
    height: 60px;         /* vaste hoogte, pas aan wat je wil */
    background-color: #111827;
    color: #F9FAFB;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;      /* padding binnen de bar */
    box-sizing: border-box; /* padding telt mee in breedte */
    z-index: 1000;
    font-family: 'Poppins', sans-serif;
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    margin: 0;            /* geen margin */
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
    color: #10B981; /* bright green on hover */
}

/* Side Navigation */
.sidenav {
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;      /* full viewport height */
    width: 0;
    background-color: #111827;
    overflow-x: hidden;
    transition: width 0.3s ease;
    padding-top: 60px;  /* space for close button */
    box-shadow: none;
    margin: 0;          /* remove any margin */
    z-index: 1100;
}

/* When opened, set width to 100% */
.sidenav.open {
    width: 100%;
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
    background-color: #0000; /* green highlight */
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

/* Style for the search input inside sidenav */
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

/* Optional: scrollbar styling */
.sidenav::-webkit-scrollbar {
    width: 6px;
}

.sidenav::-webkit-scrollbar-thumb {
    background-color: #10B981;
    border-radius: 3px;
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
