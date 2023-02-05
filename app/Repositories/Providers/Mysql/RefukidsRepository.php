<?php

namespace App\Repositories\Providers\Mysql;

use App\Models\Refukids;
use App\Repositories\Interfaces\RefukidsRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class RefukidsRepository implements RefukidsRepositoryInterface
{
    public function listar(): Collection
    {
        return Refukids::all();
    }

    public function salvar(array $attributes): Refukids
    {
        $refukids = new Refukids($attributes);
        $refukids->save();

        return $refukids;
    }
}
