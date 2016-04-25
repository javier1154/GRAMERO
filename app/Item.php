<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'nombre', 'id_categoria', 'id_unidad_compra','alertar', 'status'
    ];

    public function categoria(){
        return $this->belongsTo('App\Categoria', 'id_categoria');
    }

    public function unidad_compra(){
        return $this->belongsTo('App\Unidades_compra', 'id_unidad_compra');
    }

    public function inventarios(){
        return $this->hasMany('App\Inventario', 'id_item');
    }
}
