<?php

namespace App\Repositories\Interfaces;

use App\Models\Refukids;
use Illuminate\Database\Eloquent\Collection;

interface RefukidsRepositoryInterface
{
    public function listar(): Collection;
    public function salvar(array $attributes): Refukids;
}
