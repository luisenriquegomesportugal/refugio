<?php

namespace App\Http\Controllers\Lideranca;

use App\Http\Controllers\Controller;

class DashboardLiderancaController extends Controller
{
    public function pagina()
    {
        return view('lideranca.inicio');
    }
}
