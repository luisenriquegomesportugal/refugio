<?php

namespace App\Repositories\Providers\Mysql;

use App\Models\Membro;
use App\Repositories\Interfaces\MembroRepositoryInterface;
use Illuminate\Support\Arr;

class MembroRepository implements MembroRepositoryInterface
{
    public function salvar(array $attributes): Membro
    {
        if (Arr::has($attributes, 'foto')) {
            $attributes['foto'] = Arr::get($attributes, 'foto')->store('membros');
        }
        
        return Membro::firstOrCreate(
            Arr::only($attributes, ['celula_id', 'nome', 'nascimento', 'sexo']),
            Arr::only($attributes, ['foto', 'telefone', 'endereco', 'observacao', 'perfil'])
        );
    }
}
