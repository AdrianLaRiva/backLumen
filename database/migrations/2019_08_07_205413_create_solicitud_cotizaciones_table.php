<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudCotizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_cotizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('razon_social')->nullable();
            $table->string('email')->nullable();
            $table->string('rut')->nullable();
            $table->json('header')->nullable();
            $table->json('items')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('solicitud_cotizaciones');
    }
}
