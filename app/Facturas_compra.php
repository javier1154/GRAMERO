<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturas_compra extends Model
{
    protected $fillable = [
        'numero_factura', 'id_proveedor', 'fecha', 'id_metodo_pago', 'id_iva', 'id_usuario'
    ];

    public function inventarios(){
        return $this->hasMany('App\Inventario', 'id_factura_compra');
    }

    public function proveedor(){
        return $this->belongsTo('App\Proveedor', 'id_proveedor');
    }

    public function metodo_pago(){
        return $this->belongsTo('App\Metodos_pago', 'id_metodo_pago');
    }

    public function iva(){
        return $this->belongsTo('App\Iva', 'id_iva');
    }

    public function usuario(){
        return $this->belongsTo('App\User', 'id_usuario');
    }
}
