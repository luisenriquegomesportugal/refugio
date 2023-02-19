<?php

namespace App\Http\Controllers\Lideranca\Refukids;

use App\Http\Controllers\Controller;
use App\Models\Turma;
use App\Models\TurmaChamada;

class RefukidsTurmaLiderancaController extends Controller
{
    public function turma(Turma $turma)
    {
        return view('lideranca.refukids.chamada', compact('turma'));
    }

    public function turma_chamada(Turma $turma, TurmaChamada $turmaChamada)
    {
        return view('lideranca.refukids.presentes', compact('turma', 'turmaChamada'));
    }
}
