<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AutorizacionEncargado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autorizacionEncargado', function (Blueprint $table) {
        /*para crear los datos en la base de datos*/
            $table->increments('idAutorizacionEncargado');
            //$table->integer('idRegisroPracticas');
            $table->integer('rpe');
            $table->integer('claveUnica');
            $table->date('fechaAutorizaEncargado')->nullable();
            $table->boolean('statusEncargado')->default(false);
            $table->string('comentariosEncargado')->nullable();

            $table->timestamps();
        });
       Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autorizacionEncargado');
    }
}
