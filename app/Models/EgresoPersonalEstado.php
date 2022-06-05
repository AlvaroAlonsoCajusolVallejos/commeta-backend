<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EgresoPersonalEstado extends Model
{
    protected $table = "egreso_personal_estado";
    protected $primaryKey = array('egreso_personal', 'comentario');
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'egreso_personal',
        'comentario',
        'estado',
        'f_reg',
    ];
}
