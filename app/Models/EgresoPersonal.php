<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EgresoPersonal extends Model
{
    protected $table = "egreso_personal";
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'persona',
        'tipo',
        'year',
        'month',
        'num',
        'file',
        'f_reg',
    ];
}
