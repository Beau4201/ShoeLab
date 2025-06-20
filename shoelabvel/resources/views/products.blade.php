<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Alle Producten - Shoelab</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F3F4F6;
            margin: 0;
            padding: 40px 20px;
            color: #1F2937;
        }

        h1 {
            text-align: center;
            margin-bottom: 40px;
            font-size: 2.5rem;
        }

        .message {
            text-align: center;
            color: green;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .filter-bar {
            text-align: center;
            margin-bottom: 30px;
        }

        .filter-bar select {
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }

        .product-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .product-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px;
            width: 260px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: transform 0.2s;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-card img {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 12px;
            object-fit: cover;
            height: 200px;
        }

        .product-card h3 {
            margin-top: 0;
            font-size: 1.2rem;
            color: #111827;
        }

        .product-card p {
            font-size: 0.95rem;
            color: #6B7280;
        }

        .product-price {
            color: #10B981;
            font-weight: bold;
            margin-top: 10px;
            font-size: 1.1rem;
        }

        .release-date {
            font-size: 0.85rem;
            color: #9CA3AF;
            margin-top: 8px;
        }
    </style>
</head>
<body>
    <h1>Alle Producten</h1>

    @if(session('success'))
        <div class="message">{{ session('success') }}</div>
    @endif

    <div class="filter-bar">
        <form method="GET" action="{{ url()->current() }}">
            <label for="sort">Sorteer op: </label>
            <select name="sort" id="sort" onchange="this.form.submit()">
                <option value="">-- Selecteer --</option>
                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Naam</option>
                <option value="price" {{ request('sort') == 'price' ? 'selected' : '' }}>Prijs (Laag -> Hoog)</option>
                <option value="date" {{ request('sort') == 'date' ? 'selected' : '' }}>Release Datum</option>
            </select>
        </form>
    </div>

    <div class="product-list">
        @forelse ($products as $product)
            <div class="product-card">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                @endif
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>
                <div class="product-price">€{{ number_format($product->price, 2, ',', '.') }}</div>
                <div class="release-date">Gereleased op: {{ $product->created_at->format('d-m-Y') }}</div>
            </div>
        @empty
            <p>Geen producten gevonden.</p>
        @endforelse
    </div>
</body>
</html>

@endsection