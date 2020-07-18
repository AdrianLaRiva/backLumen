<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEstadoIdToSolicitudCotizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solicitud_cotizaciones', function (Blueprint $table) {

            $table->integer('estado_id')->unsigned()->after('items')->nullable();
            $table->date('fecha')->after('estado_id')->nullable();
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return voidphp
     */
    public function down()
    {
        Schema::table('solicitud_cotizaciones', function (Blueprint $table) {

            $table->dropColumn(['estado_id', 'fecha']);
        });
    }
}
