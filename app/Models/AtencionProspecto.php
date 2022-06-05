<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AtencionProspecto extends Model
{
    protected $table = "tb_atencionprospecto";
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'fecha_registro',
        'prospecto',
        'estado',
        'accion',
        'comentario',

    ];
}
