<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Alle Producten</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .product-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .product-card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 15px;
            width: 250px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .product-card h3 {
            margin-top: 0;
        }
        .product-price {
            color: green;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <h1>Alle Producten</h1>

    @if(session('success'))
        <div style="color: green; margin-bottom: 20px;">{{ session('success') }}</div>
    @endif

    <div class="product-list">
        @forelse ($products as $product)
            <div class="product-card">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>
                <div class="product-price">€{{ number_format($product->price, 2) }}</div>
            </div>
        @empty
            <p>Geen producten gevonden.</p>
        @endforelse
    </div>

</body>
</html>
