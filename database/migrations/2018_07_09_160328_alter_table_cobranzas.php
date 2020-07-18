<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableCobranzas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cobranzas', function (Blueprint $table) {

            $table->integer('intervalo_meses')->nullable()->after('fecha_termino');
            $table->renameColumn('fecha_termino', 'fecha_ultimo_pago');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cobranzas', function (Blueprint $table) {

            $table->dropColumn(['intervalo_meses']);
        });
    }
}
