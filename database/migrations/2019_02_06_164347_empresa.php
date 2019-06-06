<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Empresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Empresa', function (Blueprint $table) {
        /**para crear los datos en la base de datos*/ 
            $table->increments('idEmpresa');           
            $table->string('Nombre');
            $table->string('Direccion');
            $table->string('Giro');
            $table->integer('Telefono');
            $table->boolean('registrada')->default(false);
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
        Schema::dropIfExists('Empresa');
    }
}
