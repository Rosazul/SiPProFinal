<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class respuestasAlumno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestasAlumno', function (Blueprint $table) {
        /**para crear los datos en la base de datos*/ 
            $table->increments('idRespuestas');  
            $table->integer('idRegistroPracticas'); 
            $table->string('r1');
            $table->integer('r2');
            $table->integer('r3');
            $table->integer('r4');
            $table->integer('r5');
            $table->integer('r6');
            $table->integer('r7');
            $table->integer('r8');
            $table->integer('r9');
            $table->integer('r10');
            $table->integer('r11');
            $table->integer('r12');
            $table->integer('r13');
            $table->integer('r14');
            $table->string('r15');
            $table->string('r16')->nullable();
        
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
       
        Schema::dropIfExists('respuestasAlumno');
    }
}
