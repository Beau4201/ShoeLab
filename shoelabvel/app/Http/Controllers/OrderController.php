<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function showForm()
    {
        // Logica om de bestelpagina weer te geven
        return view('bestellen.bestellenenretour'); // Zorg ervoor dat je een view hebt genaamd 'orderpage.blade.php'
    }
}
