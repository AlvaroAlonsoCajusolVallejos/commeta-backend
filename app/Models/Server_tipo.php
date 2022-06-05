<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server_tipo extends Model
{
    protected $table = "server_tipo";
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'nombre',
        'estado'
    ];
}
