<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Encargado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encargado', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rpe');
            $table->string('nombre');
            $table->string('cargo');
            $table->string('carrera');
            $table->string('password');
            $table->string('correo')->nullable();
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
        Schema::drop('encargado');
    }
}
