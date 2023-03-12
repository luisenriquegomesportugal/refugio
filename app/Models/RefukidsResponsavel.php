<?php

namespace App\Models;

use Illuminate\Contracts\Database\Query\Builder;

class RefukidsResponsavel extends Membro
{
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function (Builder $query) {
            $query->distinct()
                ->whereExists(function(Builder $exists) {
                    $exists->selectRaw('1')
                        ->from('refukids as rce')
                        ->whereRaw('rce.responsavel_id = membros.id');
                });
        });
    }

    public function crianca()
    {
        return $this->belongsToMany(RefukidsCrianca::class, "refukids", "responsavel_id", "crianca_id", "id", "id");
    }
}
