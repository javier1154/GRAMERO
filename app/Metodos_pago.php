<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metodos_pago extends Model
{
    protected $fillable = [
        'nombre', 'tipo', 'status'
    ];
}
