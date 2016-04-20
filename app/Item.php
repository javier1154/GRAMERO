<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'nombre', 'id_categoria', 'id_unidad_compra','alertar', 'status'
    ];
}
