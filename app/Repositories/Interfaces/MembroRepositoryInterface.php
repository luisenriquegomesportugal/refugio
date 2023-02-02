<?php

namespace App\Repositories\Interfaces;

use App\Models\Membro;

interface MembroRepositoryInterface
{
    public function salvar(array $attributes): Membro;
}
