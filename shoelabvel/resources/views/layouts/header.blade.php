<!-- resources/views/layouts/header.blade.php -->
<header class="top-header">
    <div class="logo-container">
        <img src="{{ asset('img/IMG-20250509-WA0000.jpg') }}" alt="ShoeLab logo" class="logo-circle">
        <span class="promo-text">Shop NU! 50% korting op je eerste paar schoenen!</span>
    </div>
    <span class="burger-icon" onclick="openNav()">&#9776;</span>
</header>

<!-- Side navigation -->
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
