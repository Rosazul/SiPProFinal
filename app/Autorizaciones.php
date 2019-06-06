<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autorizaciones extends Model
{
	protected $table = 'autorizaciones';
	protected $primaryKey = 'idAutorizacion'; 
	protected $fillable = [
       		'idSolicitudEmpresa','idRegistroPracticas','rpeTutorAcademico', 'rpeEncargado', 'fechaAutorizacionEncargado','fechaAutorizacionTutorAcademico','comentariosEncargado','comentariosTutorAcademico','statusEncargado','statusTutorAcademico'
    ]; 
    //
}
