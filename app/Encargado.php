<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
     protected $table = 'encargado';
	protected $fillable = [
        'id', 'rpe','nombre', 'carrera', 'cargo', 'password', 'correo'
    ]; 
}
