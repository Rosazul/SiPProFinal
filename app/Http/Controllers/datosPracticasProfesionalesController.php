<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\TutorAcademico;
use App\registroPracticas;
use App\Reportes;
use Illuminate\Support\Carbon;

class datosPracticasProfesionalesController extends Controller
{
    public function submenuDatosPracticas($clave)
    {
    	$alumno=Alumno::where('claveUnica','=',$clave)->first();
    	$tutor=TutorAcademico::where('id','=',$alumno->idTutorAcademico)->first();
    	//dd($asesor);
        $fecha = Carbon::now()->formatLocalized('%A %d %B %Y');

    	// $alumno=registroAlumno::find($claveUnicaUnica);
    	//dd($v); //dd es para hacer pruebas de que si este entrando a la funcion
        return view('datosPracticasProfesionales')->with('alumno',$alumno)->with('fecha',$fecha)->with('tutor',$tutor);
	}

    public function submenuDatosPracticasConDatos($clave)
    {
        $alumno=Alumno::where('claveUnica','=',$clave)->first();
        $tutor=TutorAcademico::where('id','=',$alumno->idTutorAcademico)->first();
        //dd($asesor);
        $solicitud = registroPracticas::where('claveUnica','=',$alumno->claveUnica)->first();
       // dd($solicitud);
        $reportes=Reportes::where('idRegistroPracticas','=',$solicitud->idRegistroPracticas)->first();
        $fecha = Carbon::now()->formatLocalized('%A %d %B %Y');

        // $alumno=registroAlumno::find($claveUnicaUnica);
        //dd($v); //dd es para hacer pruebas de que si este entrando a la funcion
        return view('datosPracticasProfesionalesConDatos')->with('alumno',$alumno)->with('fecha',$fecha)->with('tutor',$tutor)->with('solicitud',$solicitud)->with('reportes',$reportes);

    }
    public function GuardaDatosPracticas($clave)
    {
        $alumno=Alumno::where('claveUnica','=',$clave)->first();
        $tutor=TutorAcademico::where('id','=',$alumno->idTutorAcademico)->first();
        //dd($asesor);
        $tipoPractica = request('tipoPracticas');
        $horaEntrada = request('horaEntrada');
        $horaSalida = request('horaSalida');

        $fechaInicio = request('fechaInicio');
        $fechaFin = request('fechaFin');
        $actividades = request('acts');

        $sP = new registroPracticas();//objeto para meter los valores al objeto

        $sP->claveUnica = $alumno->claveUnica;
        $sP->tipoPracticas = $tipoPractica;
        $sP->horaEntrada = $horaEntrada;
        $sP->horaSalida = $horaSalida;
        $sP->fechaInicio = $fechaInicio;
        $sP->fechaFin = $fechaFin;
        $sP->actividad = $actividades;
        
        if($sP->guardaDatosPracticas == false)
        {
          $sP->guardaDatosPracticas = true;
          $sP->update(['true' => $sP->guardaDatosPracticas]);
        }
        $sP->save();

        return redirect('datosEmpresa/'.$clave);
    }
}
