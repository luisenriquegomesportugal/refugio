<?php

namespace App\Repositories\Providers\Mysql;

use App\Models\Refukids;
use App\Models\TurmaChamada;
use App\Repositories\Interfaces\RefukidsRepositoryInterface;
use App\Repositories\Interfaces\TurmaChamadaRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class TurmaChamadaRepository implements TurmaChamadaRepositoryInterface
{
    public function listar(): Collection
    {
        return TurmaChamada::with('presentes')
            ->get();
    }

    public function salvar(array $attributes): TurmaChamada
    {
        $turma = new TurmaChamada($attributes);
        $turma->save();

        return $turma;
    }
}
