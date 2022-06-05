<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_documento extends Model
{
    protected $table = "tipo_documento";
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = true;
    protected $fillable = [
        'id', 
        'nombre',
        'longitud',
        'estado'
    ];
}
