<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iva extends Model
{
    protected $fillable = [
        'iva', 'desde', 'hasta'
    ];
}
