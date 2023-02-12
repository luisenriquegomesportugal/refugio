<?php

namespace App\Repositories\Providers\Mysql;

use App\Models\TurmaChamadaPresentes;
use App\Repositories\Interfaces\TurmaChamadaPresentesRepositoryInterface;

class TurmaChamadaPresentesRepository implements TurmaChamadaPresentesRepositoryInterface
{
    public function salvar(array $attributes): TurmaChamadaPresentes
    {
        $presente = new TurmaChamadaPresentes($attributes);
        $presente->save();

        return $presente;
    }
}
