<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsCotizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_cotizacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cotizacion_id')->unsigned();
            $table->string('nombre_producto');
            $table->string('descripcion')->nullable();
            $table->integer('cantidad')->nullable();
            $table->float('precio_unitario',20,2)->nullable();
            $table->float('descuento',20,2)->nullable();
            $table->float('total',20,2)->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('cotizacion_id')->references('id')->on('cotizaciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_cotizacion');
    }
}
