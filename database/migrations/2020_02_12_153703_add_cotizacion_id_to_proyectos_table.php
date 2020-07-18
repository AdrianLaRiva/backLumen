<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCotizacionIdToProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   Schema::table('proyectos', function (Blueprint $table) {

            $table->dropForeign('user_id');
            $table->renameColumn('user_id', 'usuario_id');
            
        });

        Schema::table('proyectos', function (Blueprint $table) {

            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('cotizacion_id')->after('usuario_id')->unsigned()->nullable();
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
        Schema::table('proyectos', function (Blueprint $table) {
            $table->dropForeign(['cotizacion_id','usuario_id']);
            $table->dropColumn(['cotizacion_id']);

            $table->renameColumn('usuario_id','user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
