<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigSolicitudCotizacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_solicitud_cotizacion', function (Blueprint $table) {
            $table->increments('id');
            $table->text('descripcion')->nullable();
            $table->text('campos_dinamicos')->nullable();
            $table->text('accion')->nullable();
            $table->text('redireccionar')->nullable();
            $table->text('mensaje')->nullable();
            $table->integer('usuario_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
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
        Schema::dropIfExists('config_solicitud_cotizacion');
    }
}
