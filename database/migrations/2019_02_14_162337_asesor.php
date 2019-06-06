<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Asesor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Asesor', function (Blueprint $table) {
        /**para crear los datos en la base de datos*/ 
            $table->increments('idAsesor');           
            $table->string('Nombre');
            $table->string('Correo');
            $table->string('Telefono');
            $table->string('Puesto');
            $table->string('TipoAsesor');
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
