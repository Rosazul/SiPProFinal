<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class AutorizacionesReportes extends Model
{
    protected $table = 'AutorizacionesReportes';
	protected $primaryKey = 'idAutorizacionReportes'; 
	protected $fillable = [
       		'idSolicitudEmpresa','idReporte','rpeTutorAcademico', 'rpeEncargado', 'fechaAutorizacionEncargado','fechaAutorizacionTutorAcademico','comentariosEncargado','comentariosTutorAcademico','statusEncargado','statusTutorAcademico'
    ]; 
}
 