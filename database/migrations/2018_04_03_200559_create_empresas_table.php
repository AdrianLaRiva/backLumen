<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rut');
            $table->string('razon_social');
            $table->string('nombre_fantasia')->nullable();
            $table->string('direccion')->nullable();
            $table->string('giro')->nullable();
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();
            $table->string('url_logo')->nullable(); //url de adjunto
            $table->string('url_logo_original')->nullable();
            $table->integer('comuna_id')->unsigned()->nullable();
            $table->integer('region_id')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();

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
        Schema::dropIfExists('empresas');
    }
}
