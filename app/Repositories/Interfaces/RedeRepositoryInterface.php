<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface RedeRepositoryInterface
{
    public function buscarTodos($columns = ['*']): Collection;
}
