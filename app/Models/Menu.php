<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menu";
    protected $primaryKey = 'codigo_menu';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'codigo_menu', 
        'icono', 
        'nombre',
        'descripcion',
        'estado',
        'nivel',
        'orden',
        'archivo',
        'proyecto',
        'id_padre'
    ];
}
