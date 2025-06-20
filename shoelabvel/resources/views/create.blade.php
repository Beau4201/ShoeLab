<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Product Aanmaken - ShoeLab</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
    
</head>
<body>
    <div class="form-container">
        <h2>Nieuw Product Toevoegen</h2>

        @if (session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="name">Productnaam</label>
            <input type="text" id="name" name="name" required>

            <label for="description">Beschrijving</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <label for="price">Prijs (€)</label>
            <input type="number" id="price" name="price" step="0.01" required>

            <label for="image">Afbeelding</label>
            <input type="file" id="image" name="image" accept="image/*">

            <button type="submit">Product Opslaan</button>
        </form>
    </div>
</body>
</html>
