<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClienteContacto extends Model
{
    protected $table = "cliente_contacto";
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'cliente',
        'encargado',
        'email',
        'telefono',
        'f_reg',
    ];
}
