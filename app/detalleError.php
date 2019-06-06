<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalleError extends Model
{
     protected $table = 'detalleerror';
	protected $fillable = [
        'idError', 'idRegistroPracticas','lugarError', 'comentarios', 'fechaModificacion', 
         ]; 
   	protected $primaryKey = 'idError';
}
