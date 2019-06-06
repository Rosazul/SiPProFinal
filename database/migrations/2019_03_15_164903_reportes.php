<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reportes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Reportes', function (Blueprint $table) {
        /**para crear los datos en la base de datos*/ 
            $table->increments('idReporte');  
            $table->integer('idRegistroPracticas'); 
            $table->string('numReporte');
            $table->date('fechaInicio');
            $table->date('fechaFin');    
            $table->string('actividad'); 
          //  $table->string('tipoPracticas');
            $table->string('nombreArchivo'); 
        
            $table->date('fechaArchivo');
                    
            $table->boolean('guardaDatosReporte')->default(false);//1: se guardo, 0 es no se guardo

            $table->string('statusReporte')->default('No Hay Reporte');
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
       
        Schema::dropIfExists('Reportes');
    }
}
