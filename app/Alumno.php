<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumno';
	protected $fillable = [
        'idAlumno', 'claveUnica', 'Nombre', 'claveIngenieria', 'password', 'carrera', 'cicloEscolar', 'semestre', 'condicion', 'situacion', 'idTutorAcademico'
    ];  
   	protected $primaryKey = 'claveUnica';

}
