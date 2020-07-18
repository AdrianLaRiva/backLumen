<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFacturaFacturaOriginalToPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pagos', function (Blueprint $table) {
            
            $table->string('factura')->nullable()->after('monto_diferido');
            $table->string('factura_original')->nullable()->after('factura');
            $table->string('nro_factura')->nullable()->after('factura_original');
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
            $table->dropColumn(array('factura','factura_original',"nro_factura"));
        });
    }
}
