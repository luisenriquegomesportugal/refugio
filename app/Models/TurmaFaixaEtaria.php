<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TurmaFaixaEtaria extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'turma_faixas_etarias';
    protected $fillable = ['turma_id', 'faixa_minima', 'faixa_maxima'];

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }
}
