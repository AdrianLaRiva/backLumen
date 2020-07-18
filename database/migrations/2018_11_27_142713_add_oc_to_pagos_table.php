<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOcToPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pagos', function (Blueprint $table) {

            $table->string('oc')->nullable()->after('monto_diferido');
            $table->string('oc_original')->nullable()->after('oc');
            $table->string('nro_oc')->nullable()->after('oc_original');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pagos', function (Blueprint $table) {

            $table->dropColumn(['oc', 'oc_original', 'nro_oc']);

        });
    }
}
