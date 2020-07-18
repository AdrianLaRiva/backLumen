<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdjuntoToMovimientosGuiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movimientos_guias', function (Blueprint $table) {
            $table->string('adjunto')->nullable()->after('comentario');
            $table->string('adjunto_original')->nullable()->after('adjunto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movimientos_guias', function (Blueprint $table) {
            $table->dropColumn(['adjunto','adjunto_original']);
        });
    }
    
}
