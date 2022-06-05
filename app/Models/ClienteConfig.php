<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClienteConfig extends Model
{
    protected $table = "cliente_config";
    protected $primaryKey = array('cliente', 'tipo');
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'cliente',
        'tipo',
        'config',
        'estado'
    ];
}
