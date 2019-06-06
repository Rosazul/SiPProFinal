<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\iniciosesionEncargado;

class inicioSesionEncargadoController extends Controller
{
    public function inicioSesionEncargado()
    {
    	$iS=iniciosesionEncargado::all();
        //$alumno=registroAlumno::find($clave);
    	//dd($v); //dd es para hacer pruebas de que si este entrando a la funcion
    	return view('inicioSesionEncargado');//->with('inicioSesion',$iS)->with('registroAlumno',$alumno);
    }

    public function GuardaSesionEncargado()
    {
        // dd("hola");
        $rpe = request("rpe");
        $password = request("contrasena");
    	//dd($n);
    	$iSE = new iniciosesionEncargado();//objeto para meter los valores al objeto
    	$iSE->rpe = $rpe; //igualamos cada dato de la vista obtenido y lo guardamos en el objeto de la base de datos
        $iSE->password = $password;

    	$iSE->save();//para guardar en la base de datos

// dd($iS);
    	return redirect('menuEncargado/'.$rpe);//para regresar a la pagina principal
    }
}
