<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ShoeLab</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <style>
      
    </style>
</head>

<body>
    <div class="winkelmandje">
  <img src="{{ asset('img/winkelmandje.png') }}" alt="Winkelmand" style="width: 50px; height: 50px; cursor: pointer;" />
</div>

    <header class="top-header" role="banner">
        <div class="logo-container">
            <img src="{{ asset('img/logosb.png') }}" alt="ShoeLab logo" class="logo-circle" action="index.blade.php"/>
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
        <a href="{{ url(path: 'contact') }}">Contact</a>
        <a href="{{ url('soortenschoenen') }}">Soorten schoenen</a>
        <a href="#over">Over ons</a>
        <a href="{{ url('products') }}">Producten</a>
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
