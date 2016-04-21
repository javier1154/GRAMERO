<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetodosPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metodos_pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
            $table->enum('tipo', ['Clientes', 'Proveedores']);
            $table->enum('status', ['Habilitado', 'Deshabilitado'])->default('Habilitado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('metodos_pagos');
    }
}
