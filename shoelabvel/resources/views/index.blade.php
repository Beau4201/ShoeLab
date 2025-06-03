<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShoeLab</title>
    <link rel="stylesheet" href="{{ asset('css/eigen-website.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
    <a id="login" href="{{ route('login') }}">Log in</a>
    <div class="logo-container" style="background-color: black; height:70px;">
        <img src="{{ asset('img/IMG-20250509-WA0000.jpg') }}" style="height:70px; width:80px;" alt="ShoeLab logo" class="logo-circle">
        <h1 id="h1">Shop NU! 50 procent korting op je eerste paar schoenen!</h1>
        
    </div>

   

    <div id="header">
        <header>ShoeLab</header>

        <div class="search-container">
        <form action="{{ route('search') }}" method="GET">
            <input type="text" name="q" id="searchInput" placeholder="Zoek een product" onkeyup="liveFilter()">
            <button type="submit">🔍</button>
        </form>
        <br> <br>
      
    </div>
      
    </div>

    
    </div>

    

    

    <section>
        <nav>
            <li><a id="Contact" href="{{ url('contact') }}">Contact</a></li>
            <li><a id="Over" href="{{ url('soortenschoenen') }}">Soorten schoenen</a></li>
            <li><a id="Over" href="#">...</a></li>
        </nav>
    </section>

    <img id="coffeeshop" src="{{ asset('img/orig_ss25_theoriginal_bnr_m_black_d_9f78cc08dc.jpg') }}">

    <section>
        <h1 id="over">Over ons</h1>
        <p id="para">Welkom bij ShoeLab, jouw online bestemming voor stijlvolle schoenen. Wij bieden een brede selectie schoenen met dropshipping gemak!</p>

        <h2 id="hp">Onze producten</h2>
        <a href="{{ route('products.index') }}">Our Products ({{ \App\Models\Product::count() }})</a>


        <div id="products">
            @forelse ($products as $product)
                <div class="product searchable">
                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->description }}</p>
                    <p>€{{ number_format($product->price, 2) }}</p>
                </div>
            @empty
                <p>Geen producten beschikbaar.</p>
            @endforelse
        </div>

        {{-- <table id="tabel" border="1" cellpadding="10" cellspacing="0">
            <tr><th colspan="2">Openingstijden</th></tr>
            <tr id="kleur"><td>Maandag</td><td>09:00 - 23:00</td></tr>
            <tr><td>Dinsdag</td><td>09:00 - 23:00</td></tr>
            <tr id="kleur"><td>Woensdag</td><td>09:00 - 23:00</td></tr>
            <tr><td>Donderdag</td><td>09:00 - 23:00</td></tr>
            <tr id="kleur"><td>Vrijdag</td><td>09:00 - 01:00</td></tr>
            <tr><td>Zaterdag</td><td>09:00 - 21:00</td></tr>
            <tr id="kleur"><td>Zondag</td><td>09:00 - 21:00</td></tr>
        </table> --}}
    </section>

    <footer id="footer">
        <div class="footer-content">
            <p id="copy">&copy; 2025 Shoelab. All Rights Reserved.</p>
            <p>Volg ons op:
                <a id="nav" href="https://facebook.com" target="_blank">Facebook</a> |
                <a id="nav" href="https://instagram.com" target="_blank">Instagram</a> |
                <a id="nav" href="https://twitter.com" target="_blank">Twitter</a>
            </p>
        </div>
    </footer>

    <script>
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
</body>

</html>
