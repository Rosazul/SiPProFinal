<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class registroPracticas extends Model
{
    protected $table = 'registropracticas';
	protected $fillable = [
        'idRegistroPracticas', 'claveUnica', 'tipoPracticas', 'horaEntrada', 'horaSalida', 'fechaInicio', 'fechaFin', 'idEmpresa', 'nombreAsesor', 'actividad', 'statusSolicitud'
    ];  
   	protected $primaryKey = 'idRegistroPracticas';

    public function alumno()
	{
		return $this->belongsTo(Alumno::class,'claveUnica');
	}

	public function empresa()
	{
		return $this->belongsTo(Empresa::class,'idEmpresa');
	}

}
