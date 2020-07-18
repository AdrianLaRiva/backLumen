<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGrupoDestinatariosToNotificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notificaciones', function (Blueprint $table) {
            $table->string('grupo', 255)->nullable()->after('leido');
            $table->string('destinatarios', 255)->nullable()->after('grupo');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notificaciones', function (Blueprint $table) {
            $table->dropColumn(array('grupo', 'destinatarios'));
        });
    }
}
