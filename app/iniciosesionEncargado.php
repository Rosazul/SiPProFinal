<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class iniciosesionEncargado extends Model
{
    protected $table = 'iniciosesionencargado';
	protected $fillable = [
        'rpe', 'password'
    ];  
}
