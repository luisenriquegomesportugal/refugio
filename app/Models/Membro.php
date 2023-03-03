<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Membro extends Model
{
    use SoftDeletes;

    protected $table = "membros";
    protected $fillable = ["celula_id", "nome", "foto", "nascimento", "sexo", "telefone", "endereco", "observacao", "perfil"];
    protected $dates = ["nascimento"];

    public function celula() {
        return $this->hasOne(Celula::class, "id", "celula_id");
    }
}
