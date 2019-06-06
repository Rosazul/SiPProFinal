<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TutorAcademicoSolicitudesPendientes extends Model
{
    protected $table = 'TutorAcademicoSolicitudesPendientes';
	  protected $fillable =[//aqui va el nombre de la tabla
        'claveUnica','idRegistroPracticas', 'Nombre', 'idCarrera'
      ];
}
