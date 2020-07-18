<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes_proveedores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rut');
            $table->string('razon_social')->unique();
            $table->string('nombre_fantasia')->nullable();
            $table->integer('tipo_empresa_id')->unsigned()->nullable();
            $table->string('giro')->nullable();
            $table->integer('cliente_proveedor')->unsigned()->nullable();
            $table->integer('usuario_id')->unsigned();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('tipo_empresa_id')->references('id')->on('tipos_empresa')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cliente_proveedor')->references('id')->on('tipos_cliente_proveedor')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes_proveedores');
    }
}
