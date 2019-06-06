<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuAlumno;
use App\Alumno;
use App\TutorAcademico;
use App\registroPracticas;
use App\Reportes;
use App\AutorizacionesReportes;

use Illuminate\Support\Carbon;

class menuAlumnoController extends Controller
{
    public function menuAlumno($clave)
    {
        $alumno=Alumno::where('claveUnica','=',$clave)->first();
        $tutor=TutorAcademico::where('id','=',$alumno->idTutorAcademico)->first();
        //dd($asesor);
        $solicitud = registroPracticas::where('claveUnica','=',$alumno->claveUnica)->first();
       
        if(!is_null($solicitud))
        {
            $reportes=Reportes::all();
            foreach ($reportes as $repo) 
            {
                $repo = Reportes::where('idRegistroPracticas','=',$solicitud->idRegistroPracticas)->first();
                $fecha = Carbon::now()->formatLocalized('%A %d %B %Y');
                return view('menuAlumno')->with('alumno',$alumno)->with('fecha',$fecha)->with('tutor',$tutor)->with('solicitud',$solicitud)->with('reportes',$reportes)->with('repo',$repo);

            }
        }
        else
        {
            $reportes=null;
        }
    //dd($solicitud);
        $fecha = Carbon::now()->formatLocalized('%A %d %B %Y');
        return view('menuAlumno')->with('alumno',$alumno)->with('fecha',$fecha)->with('tutor',$tutor)->with('solicitud',$solicitud)->with('reportes',$reportes);

    }
}
