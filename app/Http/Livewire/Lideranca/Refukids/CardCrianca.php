<?php

namespace App\Http\Livewire\Lideranca\Refukids;

use App\Models\RefukidsCrianca;
use App\Models\Turma;
use App\Models\TurmaChamada;
use Livewire\Component;

class CardCrianca extends Component
{
    public $membro;

    public $turma = null;

    public $turmaChamada = null;

    public $colunaAcao = null;

    public function render()
    {
        return view('livewire.lideranca.refukids.card-crianca');
    }
}
