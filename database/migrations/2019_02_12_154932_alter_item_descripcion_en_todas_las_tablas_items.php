<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterItemDescripcionEnTodasLasTablasItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items_cotizaciones', function (Blueprint $table) {

            $table->string('descripcion', 500)->change();
        });
        Schema::table('items_cotizaciones_productos', function (Blueprint $table) {

            $table->string('descripcion', 500)->change();
        });
        Schema::table('items_orden_compra', function (Blueprint $table) {

            $table->string('descripcion', 500)->change();
        });
        Schema::table('items_orden_compra_productos', function (Blueprint $table) {

            $table->string('descripcion', 500)->change();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
