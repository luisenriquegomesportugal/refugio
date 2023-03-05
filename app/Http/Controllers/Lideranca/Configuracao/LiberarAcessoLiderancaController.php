<?php

namespace App\Http\Controllers\Lideranca\Configuracao;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LiberarAcessoLiderancaController extends Controller
{
    public function pagina()
    {
        $usuarios = User::with('permissoes')
            ->paginate();

        return view('lideranca.configuracao.liberar-acesso', compact('usuarios'));
    }
}
