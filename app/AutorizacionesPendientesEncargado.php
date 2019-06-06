<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AutorizacionesPendientesEncargado extends Model
{
    //
    protected $table = 'EncargadoSolicitudesPendientes';
	  protected $fillable =[//aqui va el nombre de la tabla
        'claveUnica','idRegistroPracticas', 'Nombre', 'idCarrera'
      ];
}
