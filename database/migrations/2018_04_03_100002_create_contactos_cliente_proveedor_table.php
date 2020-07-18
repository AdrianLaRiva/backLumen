<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactosClienteProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactos_cliente_proveedor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_proveedor_id')->unsigned();
            $table->string('nombre')->nullable();
            $table->string('correo')->nullable();
            $table->string('telefono')->nullable();
            $table->integer('usuario_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            //$table->unique(['cliente_proveedor_id', 'correo']);
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cliente_proveedor_id')->references('id')->on('clientes_proveedores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contactos_cliente_proveedor');
    }
}
