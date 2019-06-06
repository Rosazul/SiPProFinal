<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RegistroPracticas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('registroPracticas', function (Blueprint $table) {
        /**para crear los datos en la base de datos*/ 
            $table->increments('idRegistroPracticas');          
            $table->integer('idEmpresa')->nullable();
            $table->integer('idAsesor')->nullable();
            $table->time('horaEntrada');
            $table->time('horaSalida');
            $table->integer('claveUnica');
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->string('tipoPracticas');
            $table->string('actividad');
            $table->boolean('guardaDatosPracticas')->default(false);//1: se guardo, 0 es no se guardo
            $table->boolean('guardaDatosEmpresa')->default(false);
            $table->boolean('guardaDatosAsesor')->default(false);
            $table->boolean('idAcreditacionTutorAcademico')->nullable();
            $table->boolean('idAcreditacionEncargado')->nullable();

            $table->string('statusSolicitud')->default('No Hay Solicitud');
            $table->string('lugarError')->nullable();

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
        Schema::dropIfExists('registroPracticas');
    }
}
