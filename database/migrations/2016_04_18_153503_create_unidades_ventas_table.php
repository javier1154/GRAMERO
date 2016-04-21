<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadesVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades_ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_unidad_compra')->unsigned();;
            $table->string('nombre', 100)->unique();
            $table->string('nomenclatura', 20)->unique();
            $table->integer('equivalencia')->null();
            $table->timestamps();

            $table->foreign('id_unidad_compra')->references('id')->on('unidades_compras')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('unidades_ventas');
    }
}
