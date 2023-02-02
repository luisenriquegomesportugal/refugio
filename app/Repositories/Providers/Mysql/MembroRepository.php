<?php

namespace App\Repositories\Providers\Mysql;

use App\Models\Membro;
use App\Repositories\Interfaces\MembroRepositoryInterface;

class MembroRepository implements MembroRepositoryInterface
{
    public function salvar(array $attributes): Membro 
    {
        $membro = new Membro($attributes);
        $membro->save();

        return $membro;
    }
}
