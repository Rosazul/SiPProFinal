<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AutorizacionesReportesPendientesEncargado extends Model
{
    protected $table = 'EncargadoReportesPendientes';
	  protected $fillable =[//aqui va el nombre de la tabla
        'claveUnica','idRegistroPracticas', 'Nombre', 'idCarrera'
      ];
}
 