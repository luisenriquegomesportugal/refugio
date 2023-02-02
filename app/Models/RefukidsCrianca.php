<?php

namespace App\Models;

class RefukidsCrianca extends Membro
{
    public function responsavel() {
        return $this->belongsToMany(RefukidsResponsavel::class, "refukids", "crianca_id", "responsavel_id", "membro_id", "membro_id");
    }
}
