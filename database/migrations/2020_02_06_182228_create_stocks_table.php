<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('producto_id')->unsigned();
            $table->integer('seccion_id')->unsigned();
            $table->double('stock_disponible',20, 2)->nullable();
            $table->integer('usuario_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('seccion_id')->references('id')->on('secciones_bodegas')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('items_cotizaciones_productos')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
