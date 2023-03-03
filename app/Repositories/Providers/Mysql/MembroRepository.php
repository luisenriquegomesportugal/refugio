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

        return Membro::updateOrCreate(
            Arr::only($attributes, ['celula_id', 'nome', 'nascimento', 'sexo']),
            Arr::only($attributes, ['foto', 'telefone', 'endereco', 'observacao', 'perfil'])
        );
    }

    public function atualizarFoto($membro_id, $foto): bool
    {
        $foto = $foto->store('membros');

        return Membro::find($membro_id)
            ->fill(compact('foto'))
            ->save();
    }
}
