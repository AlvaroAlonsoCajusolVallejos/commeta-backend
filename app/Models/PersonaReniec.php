<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonaReniec extends Model
{
    protected $table = "persona_reniec";
    protected $primaryKey = 'dni';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'dni',
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'fecha_nacimiento',
        'sexo',
        'domicilio',
        'verificacion'
    ];
}
