 <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivilegiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privilegios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->integer('modulo_id')->unsigned();
            $table->boolean('acceso_total');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade')->ondUpdate('cascade');
            $table->foreign('modulo_id')->references('id')->on('modulos')->onDelete('cascade')->ondUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('privilegios');
    }
}
