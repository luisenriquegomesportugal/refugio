<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TurmaChamada extends Model
{
    use HasFactory;

    protected $table = "turma_chamada";
    protected $fillable = ["dia", "turma"];

    public function presentes() {
        return $this->hasMany(TurmaChamadaPresentes::class, "turma_chamada_id");
    }
}
