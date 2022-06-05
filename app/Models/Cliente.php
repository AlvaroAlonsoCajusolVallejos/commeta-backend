<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "cliente";
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'nombre',
        'estado',
        'departamento',
        'provincia',
        'distrito',
        'ruc',
        'razon_social',
        'web',
        'tipo',
    ];
}
