<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Product Aanmaken - ShoeLab</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #121212;
            padding: 40px 20px;
            color: #E0E0E0;
            display: flex;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .form-container {
            background: #1E1E1E;
            padding: 35px 40px;
            border-radius: 14px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.7);
            max-width: 600px;
            width: 100%;
            box-sizing: border-box;
        }

        h2 {
            margin-bottom: 30px;
            font-weight: 700;
            font-size: 2rem;
            color: #4ADE80;
            text-align: center;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        label {
            display: block;
            margin-top: 20px;
            font-weight: 600;
            font-size: 1rem;
            color: #A0A0A0;
            user-select: none;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        input[type="file"] {
            width: 100%;
            margin-top: 8px;
            padding: 12px 15px;
            border-radius: 12px;
            border: 1.5px solid #333333;
            background-color: #121212;
            color: #E0E0E0;
            font-size: 1rem;
            box-sizing: border-box;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus,
        input[type="file"]:focus {
            outline: none;
            border-color: #4ADE80;
            box-shadow: 0 0 10px #4ADE80cc;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        button {
            margin-top: 30px;
            width: 100%;
            background-color: #4ADE80;
            border: none;
            padding: 15px 0;
            border-radius: 14px;
            font-weight: 700;
            font-size: 1.15rem;
            color: #121212;
            cursor: pointer;
            transition: background-color 0.3s ease;
            user-select: none;
        }

        button:hover {
            background-color: #22c55e;
        }

        .success {
            text-align: center;
            color: #4ADE80;
            margin-bottom: 25px;
            font-weight: 600;
        }

        .error {
            color: #f87171;
            margin-top: 8px;
            font-size: 0.9rem;
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
            <input type="file" id="image" name="image" accept="image/*">

            <button type="submit">Product Opslaan</button>
        </form>
    </div>
</body>
</html>
