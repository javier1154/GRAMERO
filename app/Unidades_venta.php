<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidades_venta extends Model
{
    protected $fillable = [
        'id_unidad_compra', 'nombre', 'nomenclatura', 'equivalencia'
    ];

    public function unidad_compra(){
        return $this->belongsTo('App\Unidades_compra', 'id_unidad_compra');
    }
}
