<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddComprobanteToOrdenesCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ordenes_compra', function (Blueprint $table) {

            $table->string('comprobante')->nullable()->after('monto_diferido'); //url de adjunto
            $table->string('comprobante_original')->nullable()->after('comprobante');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ordenes_compra', function (Blueprint $table) {

            $table->dropColumn(['comprobante', 'comprobante_original']);

        });
    }
}
