<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $fillable = [
        'id_item', 'cantidad', 'cantidad_venta', 'costo', 'costo_unitario', 'id_factura_compra'
    ];


    public function item(){
        return $this->belongsTo('App\Item', 'id_item');
    }

    public function factura_compra(){
        return $this->belongsTo('App\Facturas_compra', 'id_factura_compra');
    }
}
