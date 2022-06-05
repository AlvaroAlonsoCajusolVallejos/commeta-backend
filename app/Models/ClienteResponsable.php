<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClienteResponsable extends Model
{
    protected $table = "cliente_responsable";
    protected $primaryKey = ['persona', 'cliente', 'estado', 'f_reg'];
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'persona',
        'cliente',
        'estado',
        'f_reg',
    ];
}
