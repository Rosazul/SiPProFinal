<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PreguntasAlumno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntasAlumno', function (Blueprint $table) {
        /**para crear los datos en la base de datos*/ 
            $table->increments('idPreguntas');          
            $table->string('p1')->nullable(); 
            $table->string('p2')->nullable(); 
            $table->string('p3')->nullable(); 
            $table->string('p4')->nullable();
            $table->string('p5')->nullable();
            $table->string('p6')->nullable();
            $table->string('p7')->nullable();
            $table->string('p8')->nullable();
            $table->string('p9')->nullable();
            $table->string('p10')->nullable();
            $table->string('p11')->nullable();
            $table->string('p12')->nullable();
            $table->string('p13')->nullable();
            $table->string('p14')->nullable();
            $table->string('p15')->nullable();
            $table->string('p16')->nullable();
        
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
       
        Schema::dropIfExists('preguntasAlumno');
    }
}
