<?php

namespace App\Http\Controllers\Lideranca\Refukids;

use App\Http\Controllers\Controller;
use App\Models\Turma;

class RefukidsTurmaLiderancaController extends Controller
{
    public function pagina(Turma $turma)
    {
        return view('lideranca.refukids.chamada', compact('turma'));
    }
}
