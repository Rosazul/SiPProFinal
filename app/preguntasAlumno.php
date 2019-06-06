<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class preguntasAlumno extends Model
{
	protected $table = 'preguntasalumno';
	protected $primaryKey = 'idPreguntas'; 
	protected $fillable = [
       		'idPreguntas', 'p1', 'p2', 'p3', 'p4', 'p5', 'p6', 'p7', 'p8', 'p9', 'p10', 'p11', 'p12', 'p13', 'p14', 'p15', 'p16'
    ]; 
}
