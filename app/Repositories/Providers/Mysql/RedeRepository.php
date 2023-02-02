<?php

namespace App\Repositories\Providers\Mysql;

use App\Models\Rede;
use App\Repositories\Interfaces\RedeRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class RedeRepository implements RedeRepositoryInterface
{
    public function buscarTodos($columns = ['*']): Collection
    {
        return Rede::all($columns);
    }
}
