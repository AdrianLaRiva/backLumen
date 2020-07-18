<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddFacturasToDevoluciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('devoluciones', function (Blueprint $table) {
            
            $table->double('subtotal',20,2)->after('total')->nullable();
            $table->double('iva',20,2)->after('subtotal')->nullable();
            $table->string('factura')->nullable()->after('estado_id');
            $table->string('factura_original')->nullable()->after('factura');
            $table->string('nro_factura')->nullable()->after('factura_original');
            $table->string('motivo')->nullable()->after('nro_factura');
            $table->dropColumn('pagos_data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('devoluciones', function (Blueprint $table) {
            $table->dropColumn(['factura', 'factura_original', 'nro_factura', 'subtotal', 'iva', 'motivo']);
        });
    }
}
