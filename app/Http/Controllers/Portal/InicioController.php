<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;

class InicioController extends Controller
{
    public function pagina()
    {
        return view('portal.inicio');
    }
}
