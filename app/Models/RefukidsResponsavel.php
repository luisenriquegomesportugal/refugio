<?php

namespace App\Models;

class RefukidsResponsavel extends Membro
{
    public function crianca() {
        return $this->belongsToMany(RefukidsCrianca::class, "refukids", "responsavel_id", "crianca_id", "membro_id", "membro_id");
    }
}
