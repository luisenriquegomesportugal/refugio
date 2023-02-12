<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TurmaChamadaPresentes extends Model
{
    use HasFactory;

    protected $table = "turma_chamada_presentes";
    protected $fillable = ["turma_chamada_id", "membro_id"];

    public function turma_chamada() {
        return $this->belongsTo(TurmaChamada::class, "turma_chamada_id");
    }

    public function membro() {
        return $this->belongsTo(Membro::class, "membro_id");
    }
}
