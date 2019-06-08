<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Alumno;
use App\TutorAcademico;
use App\registroPracticas;
use App\Reportes;
use App\AutorizacionesReportes;
use App\Autorizaciones;
use App\AutorizacionEmpresa;
use App\Empresa;
use Illuminate\Support\Carbon;

class AlumnoAutorizacionesController extends Controller
{
    public function AlumnoAutorizaciones($claveUnica){
    	$alumno=Alumno::where('claveUnica','=',$claveUnica)->first();
        $tutor=TutorAcademico::where('id','=',$alumno->idTutorAcademico)->first();
        // dd($tutor);
        $fecha = Carbon::now()->formatLocalized('%A %d %B %Y');

        $solicitud=registroPracticas::where('claveUnica','=',$alumno->claveUnica)->first();
        $reportes = Reportes::all();
        //dd($reportes);
    	$autorizaciones=Autorizaciones::where('idRegistroPracticas','=',$solicitud->idRegistroPracticas)->first();
        // dd($autorizaciones);
    	return view('alumnoAutorizaciones')->with('alumno',$alumno)->with('fecha',$fecha)->with('tutor',$tutor)->with('alAutorizacion',$autorizaciones)->with('solicitud',$solicitud)->with('reportes',$reportes); 
    }

    public function AlumnoAutorizacionesReportes($claveUnica){
        $alumno=Alumno::where('claveUnica','=',$claveUnica)->first();
        $tutor=TutorAcademico::where('id','=',$alumno->idTutorAcademico)->first();
        // dd($tutor);
        $fecha = Carbon::now()->formatLocalized('%A %d %B %Y');

        $solicitud=registroPracticas::where('claveUnica','=',$alumno->claveUnica)->first();

        $reportes= Reportes::all();        
        $autoReporte=AutorizacionesReportes::all();
       // dd($autorizacionesReportes);
        // dd($autorizaciones);
        return view('alumnoAutorizacionesReportes')->with('alumno',$alumno)->with('fecha',$fecha)->with('tutor',$tutor)->with('alAutorizacionReporte',$autoReporte)->with('solicitud',$solicitud)->with('reportes',$reportes); 
    }

    public function AlumnoAutorizacionesEmpresa($claveUnica){
        $alumno=Alumno::where('claveUnica','=',$claveUnica)->first();
        $tutor=TutorAcademico::where('id','=',$alumno->idTutorAcademico)->first();
        // dd($tutor);
        $fecha = Carbon::now()->formatLocalized('%A %d %B %Y');

        $solicitud=registroPracticas::where('claveUnica','=',$alumno->claveUnica)->first();

        $empresa= Empresa::all();        
        $autoEmpresa=AutorizacionEmpresa::all();
       // dd($autorizacionesReportes);
        // dd($autorizaciones);
        return view('AutorizacionesEmpresa')->with('alumno',$alumno)->with('fecha',$fecha)->with('tutor',$tutor)->with('alAutorizacionEmpresa',$autoEmpresa)->with('solicitud',$solicitud)->with('empresa',$empresa); 
    }
}
