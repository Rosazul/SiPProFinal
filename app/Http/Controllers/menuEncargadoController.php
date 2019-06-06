<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encargado;
use Illuminate\Support\Carbon;

class menuEncargadoController extends Controller
{
    public function menuEncargado($rpe)
    {
    	$encargado=Encargado::where('rpe','=',$rpe)->first();
    	//dd($asesor);
        $fecha = Carbon::now()->formatLocalized('%A %d %B %Y');

    	// $alumno=registroAlumno::find($claveUnicaUnica);
    	//dd($v); //dd es para hacer pruebas de que si este entrando a la funcion
    	return view('menuEncargado')->with('encargado',$encargado)->with('fecha',$fecha);
	}
}
