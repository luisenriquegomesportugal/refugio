<?php

namespace App\Repositories\Interfaces;

use App\Models\TurmaChamada;
use Illuminate\Database\Eloquent\Collection;

interface TurmaChamadaRepositoryInterface
{
    public function listar(): Collection;
    public function salvar(array $attributes): TurmaChamada;
}
