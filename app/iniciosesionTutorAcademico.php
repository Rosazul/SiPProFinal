<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class iniciosesionTutorAcademico extends Model
{
    protected $table = 'iniciosesiontutoracademico';
	protected $fillable = [
        'rpe', 'password'
    ];  
}
