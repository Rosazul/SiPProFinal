<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Autorizaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('autorizaciones', function (Blueprint $table) {
            $table->increments('idAutorizacion');
            $table->integer('idRegistroPracticas');
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
        Schema::drop('autorizaciones');

    }
}
