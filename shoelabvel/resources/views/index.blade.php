<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ShoeLab</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <style>
        /* Reset */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background-color: #fff;
            color: #222;
            line-height: 1.6;
        }

        /* Header */
        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #000;
            padding: 15px 30px;
            color: #fff;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 8px rgb(0 0 0 / 0.3);
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-circle {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #fff;
            transition: transform 0.3s ease;
        }

        .logo-circle:hover {
            transform: scale(1.1);
        }

        .promo-text {
            font-weight: 600;
            font-size: 1.1rem;
            letter-spacing: 0.03em;
        }

        .burger-icon {
            font-size: 28px;
            cursor: pointer;
            user-select: none;
        }

        /* Side Navigation */
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1100;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            padding-top: 70px;
            transition: 0.4s ease;
            box-shadow: 2px 0 12px rgb(0 0 0 / 0.7);
        }

        .sidenav.open {
            width: 280px;
        }

        .sidenav a,
        .sidenav form input {
            padding: 15px 30px;
            display: block;
            font-size: 18px;
            color: #ddd;
            text-decoration: none;
            transition: background-color 0.3s ease;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            box-sizing: border-box;
        }

        .sidenav a:hover {
            background-color: #333;
            color: #fff;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 15px;
            right: 25px;
            font-size: 32px;
            cursor: pointer;
            color: #fff;
        }

        .sidenav form input {
            margin-top: 10px;
            border-radius: 5px;
            background-color: #222;
            color: #eee;
            border: 1px solid #444;
        }

        .sidenav form input::placeholder {
            color: #bbb;
        }

        /* Main Content */
        .main-content {
            max-width: 1200px;
            margin: 50px auto 80px;
            padding: 0 20px;
        }

        .main-content img#coffeeshop {
            width: 100%;
            max-width: 720px;
            display: block;
            margin: 0 auto 50px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgb(0 0 0 / 0.1);
            transition: transform 0.3s ease;
        }

        .main-content img#coffeeshop:hover {
            transform: scale(1.02);
        }

        section h1,
        section h2 {
            font-weight: 700;
            color: #111;
            margin-bottom: 15px;
            text-align: center;
        }

        section p {
            max-width: 650px;
            margin: 0 auto 35px;
            font-size: 1.05rem;
            color: #444;
            text-align: center;
        }

        section a.view-all-products {
            display: inline-block;
            margin-bottom: 40px;
            text-decoration: none;
            font-weight: 600;
            color: #007bff;
            border-bottom: 2px solid transparent;
            transition: border-color 0.3s ease;
        }

        section a.view-all-products:hover {
            border-color: #007bff;
        }

        /* Products Grid */
        #products {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 30px;
        }

        .product {
            background-color: #fff;
            border-radius: 14px;
            box-shadow: 0 6px 18px rgb(0 0 0 / 0.1);
            padding: 25px 20px 35px;
            text-align: center;
            transition: box-shadow 0.3s ease, transform 0.3s ease;
            cursor: pointer;
        }

        .product:hover {
            box-shadow: 0 12px 30px rgb(0 0 0 / 0.18);
            transform: translateY(-5px);
        }

        .product h3 {
            margin: 15px 0 10px;
            font-size: 1.25rem;
            color: #222;
        }

        .product p {
            font-size: 0.95rem;
            color: #666;
            min-height: 60px;
        }

        .product .price {
            margin-top: 15px;
            font-weight: 700;
            font-size: 1.2rem;
            color: #000;
        }

        /* Footer */
        footer {
            background-color: #000;
            color: #fff;
            text-align: center;
            padding: 40px 20px;
            font-size: 0.9rem;
            user-select: none;
        }

        footer p {
            margin: 8px 0;
        }

        footer a {
            color: #bbb;
            text-decoration: none;
            margin: 0 8px;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #fff;
        }

        /* Responsive tweaks */
        @media (max-width: 480px) {
            .promo-text {
                display: none; /* Hide promo on small screens for cleaner look */
            }

            .main-content {
                margin: 40px 15px 70px;
            }
        }
    </style>
</head>

<body>
    <div class="winkelmandje">
  <img src="{{ asset('img/winkelmandje.png') }}" alt="Winkelmand" style="width: 50px; height: 50px; cursor: pointer;" />
</div>

    <header class="top-header" role="banner">
        <div class="logo-container">
            <img src="{{ asset('img/IMG-20250509-WA0000.jpg') }}" alt="ShoeLab logo" class="logo-circle" action="index.blade.php"/>
            <span class="promo-text" aria-live="polite">Shop NU! 50% korting op je eerste paar schoenen!</span>
        </div>
        <span class="burger-icon" role="button" aria-label="Open navigatie menu" tabindex="0" onclick="openNav()" onkeydown="if(event.key==='Enter'){openNav()}">&#9776;</span>
    </header>

    <!-- Side navigation -->
    <nav id="mySidenav" class="sidenav" aria-label="Hoofd navigatie">
        <button class="closebtn" aria-label="Sluit navigatie menu" onclick="closeNav()">&times;</button>
        <a href="{{ route('login') }}">Log in</a>
        <form action="{{ route('search') }}" method="GET">
            <input type="text" name="q" id="searchInput" placeholder="Zoek een product" onkeyup="liveFilter()" autocomplete="off" />
        </form>
        <a href="{{ url('contact') }}">Contact</a>
        <a href="{{ url('soortenschoenen') }}">Soorten schoenen</a>
        <a href="#over">Over ons</a>
        <a href="#products">Producten</a>
    </nav>

    <main class="main-content" role="main">
        <img id="coffeeshop" src="{{ asset('img/orig_ss25_theoriginal_bnr_m_black_d_9f78cc08dc.jpg') }}" alt="ShoeLab banner" />

        <section>
            <h1 id="over">Over ons</h1>
            <p>Welkom bij ShoeLab, jouw online bestemming voor stijlvolle schoenen. Wij bieden een brede selectie schoenen met dropshipping gemak!</p>

            <h2 id="hp">Onze producten</h2>
            <a href="{{ route('products.index') }}" class="view-all-products">Bekijk alle producten ({{ \App\Models\Product::count() }})</a>

            <div id="products">
                @forelse ($products as $product)
                    <div class="product searchable" tabindex="0">
                        <h3>{{ $product->name }}</h3>
                        <p>{{ $product->description }}</p>
                        <p class="price">€{{ number_format($product->price, 2) }}</p>
                    </div>
                @empty
                    <p>Geen producten beschikbaar.</p>
                @endforelse
            </div>
        </section>
    </main>

    <footer role="contentinfo">
        <p>&copy; 2025 ShoeLab. All Rights Reserved.</p>
        <p>Volg ons op:
            <a href="https://facebook.com" target="_blank" rel="noopener noreferrer">Facebook</a> |
            <a href="https://instagram.com" target="_blank" rel="noopener noreferrer">Instagram</a> |
            <a href="https://twitter.com" target="_blank" rel="noopener noreferrer">Twitter</a>
        </p>
    </footer>

    <script>
        const sidenav = document.getElementById('mySidenav');
        function openNav() {
            sidenav.classList.add('open');
        }

        function closeNav() {
            sidenav.classList.remove('open');
        }

        function liveFilter() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            const elements = document.querySelectorAll('.searchable');

            elements.forEach(el => {
                if (el.innerText.toLowerCase().includes(input)) {
                    el.style.display = 'block';
                } else {
                    el.style.display = 'none';
                }
            });
        }

        // Accessibility: close sidenav when clicking outside or pressing Escape
        document.addEventListener('click', (e) => {
            if (!sidenav.contains(e.target) && !e.target.classList.contains('burger-icon')) {
                closeNav();
            }
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeNav();
            }
        });
    </script>




</body>

</html>
