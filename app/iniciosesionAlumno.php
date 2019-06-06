<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class iniciosesionAlumno extends Model
{
    protected $table = 'iniciosesionalumno';
	protected $fillable = [
        'claveUnica', 'password'
    ];  
}
