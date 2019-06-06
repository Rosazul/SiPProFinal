<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TutorAcademicoSolicitudesPendientes;//aqui va el nombre del modelo
use App\TutorAcademico;
use App\Alumno;
use App\registroPracticas;
use Illuminate\Support\Carbon;

class TutorAcademicoSolicitudesPendientesController extends Controller
{
    public function TutorAcademicoSolicitudesPendientes($rpe){
     	$tutor=TutorAcademico::where('rpe','=',$rpe)->first(); // va el nombre del controlador
        $solicitud = registroPracticas::with('Alumno')->get();
        //dd($solicitud);
/*        $programas = regis::with(array('progNombres' => function($query)
        {
            $query->where('ultimo', '=', 1);// validacion para traer solo el nombre que esta marcado como ultimo
        }))->where('id_prog_estatus', '=', '1')->where('id_programa','=','53')->get();*/

        $fecha = Carbon::now()->formatLocalized('%A %d %B %Y');
        //return json_encode($solicitud);
    	//dd($v); //dd es para hacer pruebas de que si este entrando a la funcion
    	return view('tutorAcademicoSolicitudesPendientes')->with('tutor',$tutor)->with('solicitud',$solicitud)->with('fecha',$fecha); 
    }
    public function Elimina($idRegistroPracticas) //no se necesita poner el tipo del dato
    {
        $s = tutorAcademicoSolicitudesPendientes::find($idRegistroPracticas);
        $s->delete();

        return redirect('tutorAcademicoSolicitudesPendientes/'.$idRegistroPracticas);//para regresar a la pagina principal
    }
}
