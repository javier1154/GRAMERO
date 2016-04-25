<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_item')->unsigned();
            $table->integer('cantidad');
            $table->integer('cantidad_venta');
            $table->float('costo');
            $table->float('costo_unitario');
            $table->integer('id_factura_compra')->unsigned();
            $table->timestamps();
            
            $table->foreign('id_item')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('id_factura_compra')->references('id')->on('facturas_compras')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inventarios');
    }
}
