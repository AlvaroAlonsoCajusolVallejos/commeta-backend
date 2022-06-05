<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuAccesos extends Model
{
    protected $table = "menu_accesos";
    protected $primaryKey = array('menu', "rol");
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'menu', 
        'rol', 
        'acceso',
        'agregar',
        'modificar',
        'eliminar',
        'imprimir'
    ];
}
