<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permissao extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $incrementing = false;

    protected $table = "permissoes";
    protected $fillable = ["id", "nome"];

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'permissoes_usuario', "permissao_id", "usuario_id");
    }
}
