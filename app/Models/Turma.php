<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turma extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "turma";
    protected $fillable = ["id", "nome"];

    public $incrementing = false;

    public function chamadas()
    {
        return $this->hasMany(TurmaChamada::class)
            ->orderByDesc('dia');
    }

    public function faixa_etaria()
    {
        return $this->hasOne(TurmaFaixaEtaria::class);
    }
}
