<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Persona_rol extends Model
{
    protected $table = "persona_rol";
    protected $primaryKey = array('idpersona', "idrol");
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'idpersona',
        'idrol',
        'fecheregistro',
        'estado',
        'id_sede'
    ];
}
