<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class respuestaAlumno extends Model
{
	protected $table = 'respuestasalumno';
	protected $primaryKey = 'idRespuestas'; 
	protected $fillable = [
       		'idRespuestas', 'idRegistroPracticas', 'r1', 'r2', 'r3', 'r4', 'r5', 'r6', 'r7', 'r9', 'r10'
    ]; 
}
