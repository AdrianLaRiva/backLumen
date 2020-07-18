<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSucursalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursales', function (Blueprint $table) {

            $table->increments('id');
            $table->string('direccion')->nullable(); 
            $table->integer('comuna_id')->unsigned()->nullable();
            $table->integer('region_id')->unsigned()->nullable();
            $table->integer('cliente_proveedor_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['cliente_proveedor_id', 'direccion']);
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cliente_proveedor_id')->references('id')->on('clientes_proveedores')->onDelete('cascade');
            $table->foreign('comuna_id')->references('id')->on('comunas')->onDelete('cascade');
            $table->foreign('region_id')->references('id')->on('regiones')->onDelete('cascade');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sucursales');
    }
}
