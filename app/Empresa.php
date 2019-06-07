<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
     protected $table = 'empresa';
	protected $fillable = [
        'idEmpresa', 'Nombre','Direccion', 'Ramo', 'Telefono', 'status'
    ]; 
   	protected $primaryKey = 'idEmpresa';

}
