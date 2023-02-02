<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Refukids extends Model
{
    protected $table = "refukids";
    protected $fillable = ["crianca_id", "responsavel_id"];

    public $incrementing = false;
    
    public function crianca() {
        return $this->belongsTo(RefukidsCrianca::class, "crianca_id");
    }

    public function responsavel() {
        return $this->belongsTo(RefukidsResponsavel::class, "responsavel_id");
    }

}
