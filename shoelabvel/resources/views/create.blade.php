<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Aanmaken - ShoeLab</title>
    <link rel="stylesheet" href="{{ asset('css/eigen-website.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            padding: 40px;
        }

        .form-container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .success {
            text-align: center;
            color: green;
            margin-bottom: 20px;
        }

        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
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
            <input type="file" id="image" name="image">

            <button type="submit">Product Opslaan</button>
        </form>
    </div>

</body>
</html>
