<?php

namespace App\Http\Livewire\Lideranca\Refukids;

use Livewire\Component;

class ChamadaRefukidsLiderancaLivewire extends Component
{
    public string $turma;
    public string $turmaDescricao;

    public function mount($turma)
    {
        switch ($turma) {
            case 'refubabys': $this->turmaDescricao = "Refubabys"; break;
            case 'refukids1': $this->turmaDescricao = "Refukids 1"; break;
            case 'refukids2': $this->turmaDescricao = "Refukids 2"; break;
            case 'refuteens': $this->turmaDescricao = "Refuteens"; break;
        }

        $this->turma = $turma;
    }

    public function render()
    {
        return view('livewire.lideranca.refukids.chamada');
    }
}
