<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $table = "server";
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'nombre',
        'host',
        'user',
        'pass',
        'pkey',
        'estado'
    ];
}
