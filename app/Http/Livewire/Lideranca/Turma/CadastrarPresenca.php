<?php

namespace App\Http\Livewire\Lideranca\Turma;

use App\Models\Turma;
use App\Models\TurmaChamada;
use Livewire\Component;

class CadastrarPresenca extends Component
{

    public $membro;

    public Turma $turma;
    public TurmaChamada $turmaChamada;

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
        return view('livewire.lideranca.turma.cadastrar-presenca');
    }
}
