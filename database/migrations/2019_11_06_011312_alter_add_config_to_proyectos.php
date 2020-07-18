<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddConfigToProyectos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->integer('tipo_proyecto')->nullable()->after('contacto_id');
            $table->date('fecha_inicio')->nullable()->after('tipo_proyecto');
            $table->date('fecha_fin')->nullable()->after('fecha_inicio');
            $table->integer('intervalo_meses')->nullable()->after('fecha_fin');
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

            $table->dropColumn(['tipo_proyecto', 'fecha_inicio', 'fecha_fin', 'intervalo_meses']);
        });
    }
}
