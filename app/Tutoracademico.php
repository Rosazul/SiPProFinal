<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TutorAcademico extends Model
{
     protected $table = 'tutoracademico';
	protected $fillable = [
        'id', 'rpe','nombre', 'password', 'correo'
    ]; 
}
