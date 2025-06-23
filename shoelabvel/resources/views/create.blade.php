@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('content')
<div class="form-container">
    <h2>Nieuw Product Toevoegen</h2>

    @if(session('success'))
        <div class="message success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="message message-error" style="color: #f87171; margin-bottom: 20px;">
            <ul style="list-style: none; padding-left: 0;">
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="name">Productnaam</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>

        <label for="description">Beschrijving</label>
        <textarea id="description" name="description" rows="4" required>{{ old('description') }}</textarea>

        <label for="price">Prijs (€)</label>
        <input type="number" id="price" name="price" step="0.01" value="{{ old('price') }}" required>

        <label for="image">Afbeelding</label>
        <input type="file" id="image" name="image" accept="image/*">

        <button type="submit">Product Opslaan</button>
    </form>
</div>
@endsection
