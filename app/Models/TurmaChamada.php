<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TurmaChamada extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "turma_chamada";
    protected $fillable = ["dia", "turma_id"];
    protected $perPage = 5;

    public function turma() {
        return $this->belongsTo(Turma::class, "turma_id");
    }

    public function presentes() {
        return $this->hasManyThrough(Membro::class, TurmaChamadaPresentes::class, "turma_chamada_id", "membro_id")
            ->orderBy("nome");
    }
}
