<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TutorAcademicoAutorizaSolicitud;
use App\llenarSolicitud;
use App\TutorAcademico;
use App\registroAlumno;

use Illuminate\Support\Carbon;

class TutorAcademicoAutorizaSolicitudController extends Controller
{
    public function TutorAcademicoAutorizaSolicitud($rpe,$claveUnica)
    {
       	$tutor = TutorAcademico::where('rpe','=',$rpe)->first();    	
        $alumno=registroAlumno::where('claveUnica','=',$claveUnica)->first();
        $solicitud=llenarSolicitud::where('claveUnica','=',$alumno->claveUnica)->first();

        $fecha = Carbon::now()->formatLocalized('%A %d %B %Y');
    	//dd($v); //dd es para hacer pruebas de que si este entrando a la funcion
    	return view('TutorAcademicoAutorizaSolicitud')->with('tutor',$tutor)->with('sol',$solicitud)->with('alumno',$alumno)->with('fecha',$fecha);        
    }
    public function GuardaAcreditacionTutor($rpe,$claveUnica)
    {

        $alumno=registroAlumno::where('claveUnica','=',$claveUnica)->first();
        $tutor = TutorAcademico::where('rpe','=',$rpe)->first();        
        //$solicitud=llenarSolicitud::all();

        $comentariotutor = request("Comentarios");
        $fechaAutorizacion = request("fechaAutorizacionSolicitudTutor");
        $status = request("statusTutor");
        
        $autorizatutor = new TutorAcademicoAutorizaSolicitud();//objeto para meter los valores al objeto

        $autorizatutor->claveUnica = $alumno->claveUnica;
        $autorizatutor->rpe = $tutor->rpe;
        $autorizatutor->comentariosTutor = $comentariotutor;
        $autorizatutor->fechaAutorizaTutor= $fechaAutorizacion;
        $autorizatutor->statusTutor = $status;
        
    	$autorizatutor->save();//para guardar en la base de datos

    	return redirect('TutorAcademicoSolicitudesPendientes/'.$rpe);//para regresar a la pagina principal
    }
}
