<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TutorAcademico;
use Illuminate\Support\Carbon;

class menuTutorAcademicoController extends Controller
{
    public function menuTutorAcademico($rpe)
    {
    	$tutorAcademico=TutorAcademico::where('rpe','=',$rpe)->first();
    	//dd($asesor);
        $fecha = Carbon::now()->formatLocalized('%A %d %B %Y');

    	// $alumno=registroAlumno::find($claveUnicaUnica);
    	//dd($v); //dd es para hacer pruebas de que si este entrando a la funcion
    	return view('menuTutorAcademico')->with('tutor',$tutorAcademico)->with('fecha',$fecha);
	}
}
