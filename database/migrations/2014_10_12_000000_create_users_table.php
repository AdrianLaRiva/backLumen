<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rut')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('cargo')->nullable();
            $table->string('telefono')->nullable();
            $table->string('movil')->nullable();
            $table->integer('rol_id')->unsigned();
            $table->string('password');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('rol_id')->references('id')->on('roles')->onDelete('cascade')->ondUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
