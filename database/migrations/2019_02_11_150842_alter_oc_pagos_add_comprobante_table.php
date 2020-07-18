<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterOcPagosAddComprobanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pagos_oc', function (Blueprint $table) {
            $table->string('comprobante', 255)->nullable()->after('usuario_id');
            $table->string('comprobante_original', 255)->nullable()->after('comprobante');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pagos_oc', function (Blueprint $table) {
            $table->dropColumn(array('comprobante', 'comprobante_original'));
        });

    }
}
