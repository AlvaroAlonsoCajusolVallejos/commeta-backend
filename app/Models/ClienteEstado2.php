<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClienteEstado2 extends Model
{
    protected $table = "cliente_estado2";
    protected $primaryKey = ['cliente', 'estado', 'f_reg'];
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'cliente',
        'estado',
        'f_reg',
    ];
}
