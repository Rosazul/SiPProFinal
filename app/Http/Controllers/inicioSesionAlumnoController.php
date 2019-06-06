<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\iniciosesionAlumno;

class inicioSesionAlumnoController extends Controller
{
    public function inicioSesionAlumno()
    {
    	$iS=iniciosesionAlumno::all();
    	return view('inicioSesionAlumno');
    }

    public function GuardaSesionAlumno()
    {
        $clave = request("clave");
        $password = request("contrasena");
    	//dd($n);
    	$iS = new iniciosesionAlumno();//objeto para meter los valores al objeto
    	$iS->claveUnica = $clave; //igualamos cada dato de la vista obtenido y lo guardamos en el objeto de la base de datos
        $iS->password = $password;

    	$iS->save();//para guardar en la base de datos*/

    	return redirect('/menuAlumno/'.$clave);//para regresar a la pagina principal
    }
}
