<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EncargadoReportesPendientes extends Model
{
     protected $table = 'EncargadoReportesPendientes';
	  protected $fillable =[//aqui va el nombre de la tabla
        'claveUnica','idReporte', 'Nombre', 'idCarrera'
      ];
}
 