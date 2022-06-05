<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log_intranet extends Model
{
    protected $table = "log_intranet";
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = true;
    protected $fillable = [
        'id', 
        'idpersona',
        'tabla',
        'accion',
        'data_old',
        'data_new',
        'data_new',
        'observacion',
        'created_at'
    ];
}
