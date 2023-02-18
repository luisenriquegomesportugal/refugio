<?php

namespace App\Http\Livewire\Lideranca;

use Livewire\Component;

class Mensagens extends Component
{
    public bool $show = false;

    public function mount()
    {
        $this->show = session('sucesso')
            || session('alerta')
            || session('erro');
    }

    public function render()
    {
        return view('livewire.lideranca.mensagens');
    }
}
