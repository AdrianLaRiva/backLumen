<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empresas', function (Blueprint $table) {

            $table->string('banco')->nullable()->after('correo');
            $table->string('nro_cuenta')->nullable()->after('banco');
            $table->string('tipo_cuenta')->nullable()->after('nro_cuenta');
            $table->string('rut_titular')->nullable()->after('tipo_cuenta');
            $table->string('titular')->nullable()->after('rut_titular');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empresas', function (Blueprint $table) {

            $table->dropColumn(['banco', 'nro_cuenta', 'tipo_cuenta', 'rut_titular', 'titular']);
        });
    }
}
