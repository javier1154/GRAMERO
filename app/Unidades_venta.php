<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidades_venta extends Model
{
    protected $fillable = [
        'id_unidad_compra', 'nombre', 'nomenclatura', 'equivalencia'
    ];
}
