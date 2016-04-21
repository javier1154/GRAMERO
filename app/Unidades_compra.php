<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidades_compra extends Model
{
    protected $fillable = [
        'nombre', 'nomenclatura'
    ];

    public function unidad_venta(){
        return $this->hasOne('App\Unidades_venta', 'id_unidad_compra');
    }

    public function items(){
        return $this->hasMany('App\Item', 'id_unidad_compra');
    }
}
