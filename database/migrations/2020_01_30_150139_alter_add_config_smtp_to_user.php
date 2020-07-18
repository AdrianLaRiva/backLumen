<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddConfigSmtpToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('config_mail_host')->nullable()->after('firma');
            $table->text('config_mail_puerto')->nullable()->after('config_mail_host');
            $table->text('config_mail_email')->nullable()->after('config_mail_puerto');
            $table->text('config_mail_clave')->nullable()->after('config_mail_email');
        });

        Schema::table('empresas', function (Blueprint $table) {
            $table->dropColumn('config_mail_host');
            $table->dropColumn('config_mail_puerto');
            $table->dropColumn('config_mail_email');
            $table->dropColumn('config_mail_clave');
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['config_mail_host']);
        $table->dropColumn(['config_mail_puerto']);
        $table->dropColumn(['config_mail_email']);
        $table->dropColumn(['config_mail_clave']);
        });

        Schema::table('empresas', function (Blueprint $table) {
            $table->string('config_mail_host')->after('region_id')->nullable();
            $table->string('config_mail_puerto')->after('config_mail_host')->nullable();
            $table->string('config_mail_email')->after('config_mail_puerto')->nullable();
            $table->string('config_mail_clave')->after('config_mail_email')->nullable();
        });
    }
}
