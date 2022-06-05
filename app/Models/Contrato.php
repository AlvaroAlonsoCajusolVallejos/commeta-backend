<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = "contrato";
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'cliente',
        'f_ini',
        'f_fin',
        'cuotas',
        'tipo',
        'monto',
        'moneda',
        'estado'
    ];
}
