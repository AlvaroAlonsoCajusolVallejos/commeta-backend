<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = "persona";
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'idtipodoc',
        'ndocumento',
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'direccion',
        'fecha_nacimiento',
        'sexo',
        'telefono',
        'email',
        'estado',
        'direccion',
        'codigo_departamento',
        'codigo_provincia',
        'codigo_distrito'
    ];
}
