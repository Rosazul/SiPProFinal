<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
 
class AutorizacionesReportes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
            Schema::create('AutorizacionesReportes', function (Blueprint $table) {
            $table->increments('idAutorizacionReportes');
            $table->integer('idRegistroPracticas');
            $table->integer('idReporte');
            $table->integer('rpeTutorAcademico');
            $table->integer('rpeEncargado')->nullable();
            $table->date('fechaAutorizacionEncargado')->nullable();
            $table->date('fechaAutorizacionTutorAcademico')->nullable();
            $table->string('comentariosEncargado')->nullable();
            $table->string('comentariosTutorAcademico')->nullable();
            $table->boolean('statusEncargado')->nullable();
            $table->boolean('statusTutorAcademico')->nullable();
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
         Schema::drop('AutorizacionesReportes');
    }
}
