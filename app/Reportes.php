<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reportes extends Model
{
    protected $table = 'Reportes';
	protected $fillable = [
        'idReporte','idRegistroPracticas','numReporte',  'fechaInicio', 'fechaFin', 'actividad','nombreArchivo','fechaArchivo','statusReporte','guardaDatosReporte'
    ];  
   	protected $primaryKey = 'idReporte';

    public function alumno()
	{
		return $this->belongsTo(Alumno::class,'claveUnica');
	}
}