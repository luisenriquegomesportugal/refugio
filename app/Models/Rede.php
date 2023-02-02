<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rede extends Model
{
    protected $table = "redes";
    protected $fillable = ["id", "supervisor_id", "nome"];

    public $incrementing = false;

    public function supervisor() {
        return $this->hasOne(Membro::class, "id", "supervisor_id");
    }

    public function celulas() {
        return $this->hasMany(Celula::class, "rede_id");
    }
}
