<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TutorAcademicoReportesPendientes extends Model
{
     protected $table = 'TutorAcademicoReportesPendientes';
	  protected $fillable =[//aqui va el nombre de la tabla
        'claveUnica','idReporte', 'Nombre', 'idCarrera'
      ];
}
