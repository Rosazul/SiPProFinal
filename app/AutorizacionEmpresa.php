<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AutorizacionEmpresa extends Model
{
	protected $table = 'autorizacionempresa';
	protected $primaryKey = 'idAutorizacionEmpresa'; 
	protected $fillable = [
       		'idAutorizacionEmpresa','idEmpresa','idRegistroPracticas', 'rpeEncargado', 'fechaAutorizacionEncargado', 'comentariosEncargado', 'statusEncargado'
    ]; 
    //
}
