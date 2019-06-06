<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EncargadoSolicitudesPendientes;//aqui va el nombre del modelo
use App\Encargado;
use App\registroPracticas;
use App\registroAlumno;
use App\llenarSolicitud;
use Illuminate\Support\Carbon;

class EncargadoSolicitudesPendientesController extends Controller
{
    public function EncargadoSolicitudesPendientes($rpe){
     	$encargado=Encargado::where('rpe','=',$rpe)->first(); // va el nombre del controlador
     	 $solicitud = registroPracticas::with('Alumno')->get();

        $fecha = Carbon::now()->formatLocalized('%A %d %B %Y');
    	//dd($v); //dd es para hacer pruebas de que si este entrando a la funcion
    	return view('encargadoSolicitudesPendientes')->with('encargado',$encargado)->with('solicitud',$solicitud)->with('fecha',$fecha); 
    }
     public function Elimina($idRegistroPracticas) //no se necesita poner el tipo del dato
    {
        $s = EncargadoSolicitudesPendientes::find($idRegistroPracticas);
        $s->delete();

        return redirect('EncargadoSolicitudesPendientes/'.$idRegistroPracticas);//para regresar a la pagina principal
    }

}



    	
   