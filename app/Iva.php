<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iva extends Model
{
    protected $fillable = [
        'iva', 'desde', 'hasta'
    ];

    public function facturas_compras(){
        return $this->hasMany('App\Facturas_compra', 'id_iva');
    }
}
