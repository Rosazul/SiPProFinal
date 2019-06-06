<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TutorAcademicoAutorizaSolicitud extends Model
{
    protected $table = 'tutoracademicoautorizasolicitud';
   	protected $fillable = [
    	'idAutorizacionTutorAcademico','idRegistroPracticas','rpe','fechaAutorizaTutor','statusTutor','comentariosTutor'
    ];
}
