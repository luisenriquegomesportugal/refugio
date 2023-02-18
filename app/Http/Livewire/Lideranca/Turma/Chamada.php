<?php

namespace App\Http\Livewire\Lideranca\Turma;

use App\Models\Turma;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Chamada extends Component
{
    use WithPagination;

    public Turma $turma;

    public function adicionarChamada()
    {
        $this->turma
            ->chamadas()
            ->create([
                'dia' => Carbon::today()
            ]);

        $this->turma->refresh();
    }

    public function render()
    {
        return view('livewire.lideranca.turma.chamada');
    }
}
