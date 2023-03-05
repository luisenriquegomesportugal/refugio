<?php

namespace App\Http\Livewire\Lideranca\Modals\Configuracao;

use App\Models\User;
use Livewire\Component;

class LiberarAcessoPermissoes extends Component
{
    public User $usuario;


    public function salvarPermissoes($permissao, $checked)
    {
        if($checked)
        {
            $this->usuario
                ->permissoes()
                ->detach($permissao);
        }
        else
        {
            $this->usuario
                ->permissoes()
                ->attach($permissao);
        }

        $this->usuario->refresh();
    }

    public function render()
    {
        return view('livewire.lideranca.modals.configuracao.liberar-acesso-permissoes');
    }
}
