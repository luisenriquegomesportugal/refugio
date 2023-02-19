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
        $this->turmaChamada
            ->presentes()
            ->attach($membro_id);

        $this->turmaChamada->refresh();
    }

    public function removerPresenca($membro_id)
    {
        $this->turmaChamada
            ->presentes()
            ->detach($membro_id);

        $this->turmaChamada->refresh();
    }

    public function render()
    {
        return view('livewire.lideranca.turma.presentes');
    }
}
