<?php

namespace App\Repositories\Interfaces;

use App\Models\TurmaChamadaPresentes;

interface TurmaChamadaPresentesRepositoryInterface
{
    public function salvar(array $attributes): TurmaChamadaPresentes;
}
