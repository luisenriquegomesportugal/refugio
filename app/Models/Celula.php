<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Celula extends Model
{
    protected $table = "celulas";
    protected $fillable = ["id", "rede_id", "lider_id", "nome", "endereco"];

    public function rede() {
        return $this->belongsTo(Rede::class, "rede_id");
    }

    public function lider() {
        return $this->belongsTo(Membro::class, "lider_id");
    }
}
