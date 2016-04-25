<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas_compras', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('numero_factura');
            $table->integer('id_proveedor')->unsigned();
            $table->date('fecha');
            $table->integer('id_metodo_pago')->unsigned();
            $table->integer('id_iva')->unsigned();
            $table->integer('id_usuario')->unsigned();
            $table->timestamps();

            $table->foreign('id_proveedor')->references('id')->on('proveedores')->onDelete('cascade');
            $table->foreign('id_metodo_pago')->references('id')->on('metodos_pagos')->onDelete('cascade');
            $table->foreign('id_iva')->references('id')->on('ivas')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('facturas_compras');
    }
}
