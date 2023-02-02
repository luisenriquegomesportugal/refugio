<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    public const ADMINISTRADOR_ROLE = 0; 
    public const PASTOR_ROLE = 1; 
    public const SUPERVISOR_ROLE = 2; 
    public const LIDER_ROLE = 3; 
    public const NUCLEO_ROLE = 4;
    public const MEMBRO_ROLE = 5;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "usuarios";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "google_id",
        "nome_completo",
        "nome",
        "email",
        "foto",
        "acesso"
    ];
}
