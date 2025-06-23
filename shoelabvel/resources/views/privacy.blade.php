@extends('layouts.app')

@section('title', 'Privacyverklaring')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/privacy.css') }}">
@endsection


@section('content')
    <div class="privacy-container">
        <h1>Privacyverklaring</h1>

        <p>Bij ons hechten we veel waarde aan jouw privacy. In deze privacyverklaring leggen we uit welke persoonsgegevens we verzamelen en wat we ermee doen.</p>

        <h2>Welke gegevens verzamelen we?</h2>
        <ul>
            <li>Naam</li>
            <li>E-mailadres</li>
            <li>Telefoonnummer</li>
            <li>Adres en postcode</li>
        </ul>

        <h2>Waarom verzamelen we deze gegevens?</h2>
        <p>We gebruiken jouw gegevens om:</p>
        <ul>
            <li>Je bestellingen te verwerken</li>
            <li>Je op de hoogte te houden van je account en producten</li>
            <li>Onze dienstverlening te verbeteren</li>
        </ul>

        <h2>Jouw rechten</h2>
        <p>Je hebt het recht om je gegevens in te zien, te wijzigen of te verwijderen. Neem hiervoor contact met ons op.</p>

        <h2>Contact</h2>
        <p>Heb je vragen over onze privacyverklaring? Bel ons via <a href="callto: +31628439193">+31628439193</a>.</p>

        <p style="margin-top: 40px; font-size: 0.9rem; color: #888;">Laatst bijgewerkt: {{ now()->format('d-m-Y') }}</p>
    </div>
@endsection
