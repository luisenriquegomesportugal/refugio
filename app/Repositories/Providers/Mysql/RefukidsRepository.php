<?php

namespace App\Repositories\Providers\Mysql;

use App\Models\Refukids;
use App\Repositories\Interfaces\RefukidsRepositoryInterface;

class RefukidsRepository implements RefukidsRepositoryInterface
{
    public function salvar(array $attributes): Refukids 
    {
        $refukids = new Refukids($attributes);
        $refukids->save();

        return $refukids;
    }
}
