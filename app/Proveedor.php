<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{

	protected $table = "proveedores";

    protected $fillable = [
        'rif', 'nombre', 'direccion', 'telefono', 'email', 'status', 'id_usuario'
    ];
}
