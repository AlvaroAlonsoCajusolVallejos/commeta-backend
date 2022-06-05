<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbOpcion extends Model
{
    protected $table = "tb_opcion";
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = true;
    protected $fillable = [
        'id',
        'tipo',
        'nombre',
        'default',
        'estado'
    ];
}
