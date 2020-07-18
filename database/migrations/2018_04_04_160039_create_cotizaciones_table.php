<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->integer('sucursal_id')->unsigned();
            $table->float('subtotal',20,2)->nullable();
            $table->float('descuento_global_porcentaje',20,2)->nullable();
            $table->float('descuento_global_CLP',20,2)->nullable();
            $table->float('total_neto',20,2)->nullable();
            $table->float('iva',20,2)->nullable();
            $table->float('total_bruto',20,2)->nullable();
            $table->integer('tipo_impuesto_id')->unsigned();
            $table->integer('contacto_id')->unsigned();
            $table->date('fecha')->nullable();
            $table->json('campos_personalizados')->nullable();
            $table->text('condicion')->nullable();
            $table->integer('estado_id')->unsigned();
            $table->integer('tipo_pago_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes_proveedores')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
            $table->foreign('tipo_pago_id')->references('id')->on('tipos_pago')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sucursal_id')->references('id')->on('sucursales')->onDelete('cascade');
            $table->foreign('tipo_impuesto_id')->references('id')->on('tipos_impuesto')->onDelete('cascade');
            $table->foreign('contacto_id')->references('id')->on('contactos_cliente_proveedor')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotizaciones');
    }
}
