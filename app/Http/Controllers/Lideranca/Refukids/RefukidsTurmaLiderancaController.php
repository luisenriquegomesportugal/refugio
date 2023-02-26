<?php

namespace App\Http\Controllers\Lideranca\Refukids;

use App\Http\Controllers\Controller;
use App\Models\RefukidsCrianca;
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
        $faixaEtaria = $turma->faixa_etaria;

        $membros = RefukidsCrianca::orderBy('nome')
            ->whereRaw('timestampdiff(year, nascimento, curdate()) between ? and ?', [$faixaEtaria->faixa_minima, $faixaEtaria->faixa_maxima])
            ->get();

        return view('lideranca.refukids.presentes', compact('turma', 'turmaChamada', 'membros'));
    }
}
