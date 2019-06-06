<?php

namespace App\Http\Controllers\EncargadoAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Encargado;

class MenuEncargadoController extends Controller
{
     public function MenuEncargado($rpe)
    {
    	$encargado=Encargado::where('rpe','=',$rpe)->first();
    	//dd($alumno);
    	// $alumno=registroAlumno::find($clave);
    	//dd($v); //dd es para hacer pruebas de que si este entrando a la funcion
    	return view('menuEncargado')->with('encargado',$encargado);
    }
}
