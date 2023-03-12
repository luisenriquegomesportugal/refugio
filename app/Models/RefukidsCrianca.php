<?php

namespace App\Models;

use Illuminate\Contracts\Database\Query\Builder;

class RefukidsCrianca extends Membro
{
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function (Builder $query) {
            $query->distinct()
                ->whereExists(function(Builder $exists) {
                    $exists->selectRaw('1')
                        ->from('refukids as rce')
                        ->whereRaw('rce.crianca_id = membros.id');
                });
        });
    }
    public function responsaveis()
    {
        return $this->belongsToMany(RefukidsResponsavel::class, "refukids", "crianca_id", "responsavel_id", "id", "id");
    }
}
