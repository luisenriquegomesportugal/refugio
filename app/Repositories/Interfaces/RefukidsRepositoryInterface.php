<?php

namespace App\Repositories\Interfaces;

use App\Models\Refukids;

interface RefukidsRepositoryInterface
{
    public function salvar(array $attributes): Refukids;
}
