<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asesor extends Model
{
     protected $table = 'asesor';
	protected $fillable = [
        'idAsesor', 'Nombre','Puesto', 'Correo', 'TipoAsesor', 'Telefono'
    ]; 
   	protected $primaryKey = 'idAsesor';
}
