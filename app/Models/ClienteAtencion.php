<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClienteAtencion extends Model
{
    protected $table = "cliente_atencion";
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'cliente',
        'descripcion',
        'accion',
        'persona',
        'estado',
        'f_reg',
    ];
}
