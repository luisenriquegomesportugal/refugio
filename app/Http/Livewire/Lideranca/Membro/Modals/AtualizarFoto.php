<?php

namespace App\Http\Livewire\Lideranca\Membro\Modals;

use App\Models\Membro;
use Livewire\Component;

class AtualizarFoto extends Component
{
    public Membro $membro;

    public function render()
    {
        return view('livewire.lideranca.membro.modals.atualizar-foto');
    }
}
