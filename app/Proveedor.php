<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{

	protected $table = "proveedores";

    protected $fillable = [
        'rif', 'nombre', 'direccion', 'telefono', 'email', 'status', 'id_usuario'
    ];

    public function usuario(){
        return $this->belongsTo('App\User', 'id_usuario');
    }

    public function inventarios(){
        return $this->hasMany('App\Facturas_compra', 'id_proveedor');
    }
}
