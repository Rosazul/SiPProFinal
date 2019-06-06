<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\autorizarSolicitudEncargado;
use App\registroAlumno;
use App\llenarSolicitud;
use App\registroEncargado;
use Illuminate\Support\Carbon;

class autorizarSolicitudEncargadoController extends Controller
{
   public function autorizarSolicitudEncargado($rpe, $claveUnica)
    {
        $encargado=registroEncargado::where('rpe','=',$rpe)->first();
        $alumno=registroAlumno::where('claveUnica','=',$claveUnica)->first();
        $solicitud=llenarSolicitud::where('claveUnica','=',$alumno->claveUnica)->first();

        $fecha = Carbon::now()->formatLocalized('%A %d %B %Y');

    	return view('autorizacionSolicitudEncargado')->with('encargado',$encargado)->with('sol',$solicitud)->with('alumno',$alumno)->with('fecha',$fecha);        
    } 

    public function GuardaAcreditacionEncargado($rpe,$claveUnica)
    {
        $alumno=registroAlumno::where('claveUnica','=',$claveUnica)->first();
        $encargado=registroEncargado::where('rpe','=',$rpe)->first();
        //$solicitud=llenarSolicitud::all();

        $comentarioEncargado = request("Comentarios");
        $fechaAutorizacion = request("fechaAutorizacionSolicitudEncargado");
        $status = request("statusEncargado");

    	$autorizaEncargado = new autorizarSolicitudEncargado();//objeto para meter los valores al objeto
        $autorizaEncargado->claveUnica = $alumno->claveUnica;
        $autorizaEncargado->rpe = $encargado->rpe;
        //$autorizaEncargado->idRegistroPracticas = $solicitud;
        $autorizaEncargado->comentariosEncargado = $comentarioEncargado;
        $autorizaEncargado->fechaAutorizaEncargado= $fechaAutorizacion;
        $autorizaEncargado->statusEncargado = $status;
        
    	$autorizaEncargado->save();//para guardar en la base de datos

    	return redirect('EncargadoSolicitudesPendientes/'.$rpe);//para regresar a la pagina principal
    }
}
