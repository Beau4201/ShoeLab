@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('content')
    <h1>ALLE PRODUCTEN</h1>

    @if(session('success'))
        <div class="message">{{ session('success') }}</div>
    @endif

    <div class="filter-bar">
        <form method="GET" action="{{ url()->current() }}">
            <label for="sort" class="sr-only">Sorteer op</label>
            <select name="sort" id="sort" onchange="this.form.submit()">
                <option value="">-- Selecteer --</option>
                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Naam</option>
                <option value="price" {{ request('sort') == 'price' ? 'selected' : '' }}>Prijs (Laag → Hoog)</option>
                <option value="date" {{ request('sort') == 'date' ? 'selected' : '' }}>Release Datum</option>
            </select>
        </form>
    </div>

<div class="product-list">
    @forelse ($products as $product)
        <div class="product-card" tabindex="0" aria-label="Product {{ $product->name }}, prijs €{{ number_format($product->price, 2, ',', '.') }}">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
            @endif
            
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->description }}</p>
            <div class="product-price">€{{ number_format($product->price, 2, ',', '.') }}</div>
            <div class="release-date">Gereleased op: {{ $product->created_at->format('d-m-Y') }}</div>
             <button id="plusbutton" class="plusbutton" onclick="addItem('Item 1')">+</button>
            </div>
            </div>
    @empty
        <p style="text-align:center; color:#aaa; font-style: italic;">Geen producten gevonden.</p>
    @endforelse
</div>
@endsection
