<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClienteServer extends Model
{
    protected $table = "cliente_server";
    protected $primaryKey = array('cliente', 'server');
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'cliente',
        'server',
        'capacidad',
        'url',
        'path',
        'path_analytic',
        'estado'
    ];
}
