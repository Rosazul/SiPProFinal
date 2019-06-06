<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleError extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleError', function (Blueprint $table) {
            $table->increments('idError');
            $table->integer('idRegistroPracticas')->nullable();
            $table->integer('lugarError')->nullable();
            $table->string('comentarios')->nullable();
            $table->date('fechaModificacion')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detalleError');
    }
}
