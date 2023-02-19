<?php

namespace App\Http\Livewire\Lideranca\Turma;

use App\Models\Membro;
use App\Models\Turma;
use App\Models\TurmaChamada;
use Livewire\Component;
use mysql_xdevapi\Collection;

class Presentes extends Component
{
    public Turma $turma;
    public TurmaChamada $turmaChamada;

    public $membros;

    public function mount()
    {
        $this->membros = Membro::orderBy('nome')->get();
    }

    public function cadastrarPresenca($membro_id)
    {
        dd($this->turmaChamada, $membro_id);
    }

    public function removerPresenca($membro_id)
    {
        dd($this->turmaChamada, $membro_id);
    }

    public function render()
    {
        return view('livewire.lideranca.turma.presentes');
    }
}
