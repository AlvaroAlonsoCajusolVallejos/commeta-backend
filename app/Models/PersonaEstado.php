<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonaEstado extends Model
{
    protected $table = "persona_estado";
    protected $primaryKey = array('persona', 'estado', 'f_reg');
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'persona',
        'estado',
        'f_reg'
    ];
}
