<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prospecto extends Model
{
    protected $table = "tb_prospecto";
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'fecha_registro',
        'origen',
        'nombre_contacto',
        'empresa',
        'cargo',
        'institucion',
        'consulta',
        'fecha_ulti',
        'accion',
        'cotizacion_estado',
        'estado',
        'comentario',
        'email',
        'telefono',
        'correo'
    ];
}
