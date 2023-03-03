<?php

namespace App\Repositories\Interfaces;

use App\Models\Membro;

interface MembroRepositoryInterface
{
    public function salvar(array $attributes): Membro;
    public function atualizarFoto($membro_id, $foto): bool;
}
