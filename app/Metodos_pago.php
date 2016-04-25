<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metodos_pago extends Model
{
    protected $fillable = [
        'nombre', 'tipo', 'status'
    ];

    public function facturas_compras(){
        return $this->hasMany('App\Facturas_compra', 'id_metodo_pago');
    }
}
