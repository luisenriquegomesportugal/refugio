<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class InicioController extends Controller
{
    public function pagina()
    {
        return view('inicio');
    }
}
