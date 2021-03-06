<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'nombre', 'tipo', 'status'
    ];

    public function items(){
        return $this->hasMany('App\Item', 'id_categoria');
    }
}
