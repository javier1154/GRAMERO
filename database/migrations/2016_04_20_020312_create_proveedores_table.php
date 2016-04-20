<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rif', 100)->unique();
            $table->string('nombre', 100);
            $table->text('direccion');
            $table->string('telefono', 12);
            $table->string('email', 100);   
            $table->enum('status', ['Habilitado', 'Deshabilitado'])->default('Habilitado');
            $table->integer('id_usuario'); //quien registra al proveedor
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
        Schema::drop('proveedores');
    }
}
