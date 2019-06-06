<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Alumno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno', function (Blueprint $table) {
            $table->increments('idAlumno');
            $table->integer('claveUnica');
            $table->string('Nombre');
            $table->string('claveIngenieria');
            $table->string('carrera');
            $table->string('cicloEscolar');
            $table->integer('semestre');
            $table->string('condicion');
            $table->string('situacion');
            $table->integer('idTutorAcademico');
            $table->string('password');
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
        Schema::drop('alumno');
    }
}
