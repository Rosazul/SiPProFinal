<?php

namespace App\Http\Controllers;
use App\AutorizacionesPendientesEncargado;
use Illuminate\Http\Request;
use App\Encargado;
use App\Alumno;
use App\registroPracticas;
use Illuminate\Support\Carbon;

 
class AutorizacionesPendientesEncargadoController extends Controller
{
	public function EncargadoReportesPendientes($rpe){
     	$encargado=Encargado::where('rpe','=',$rpe)->first(); // va el nombre del controlador
        $solicitud = registroPracticas::with('Alumno')->get();

        $fecha = Carbon::now()->formatLocalized('%A %d %B %Y');
        //return json_encode($solicitud);
    	//dd($v); //dd es para hacer pruebas de que si este entrando a la funcion
    	return view('encargadoReportesPendientes')->with('encargado',$encargado)->with('solicitud',$solicitud)->with('fecha',$fecha); 
    }
  public function GuardaAcreditacionEncargado($rpe,$claveUnica)
    {
        $encargado = Encargado::where('rpe','=',$rpe)->first();        

        $alumno=Alumno::where('claveUnica','=',$claveUnica)->first();        
        $sol=registroPracticas::where('claveUnica','=',$alumno->claveUnica)->first();

        $comentariotutor = request("Comentarios");
        $fechaAutorizacion = request("fechaAutorizacion");
        $statusEncargado = request("radio");
        
        $autorizaencargado = new AutorizacionesReportes();//objeto para meter los valores al objeto

        $autorizaencargado->claveUnica = $sol->claveUnica;
        $autorizaencargado->rpe = $encargado->rpe;
        $autorizaencargado->comentariosEncargado = $comentariotutor;
        $autorizaencargado->fechaAutorizacionEncargado= $fechaAutorizacion;
        $autorizaencargado->statusEncargado = $status;

        if($autorizaencargado->statusEncargado == '0')
        {
          $autorizaencargado->statusEncargado = 0;
//          $autorizatutor->update(['false' => $autorizatutor->statusTutorAcademico]);
        }

        if($autorizaencargado->statusEncargado == '1')
        {
          $autorizaencargado->statusEncargado = 1;
  //        $autorizatutor->update(['true' => $autorizatutor->statusTutorAcademico]);
        }

        //dd($autorizatutor);
    	$autorizaencargado->save();//para guardar en la base de datos

    	return redirect('/menuEncargado'.$rpe);//para regresar a la pagina principal
    }

    public function Elimina($idRegistroPracticas) //no se necesita poner el tipo del dato
    {
        $auEncargado = EncargadoReportesPendientes::find($idRegistroPracticas);
        $auEncargado->delete();

        return redirect('/menuEncargado/'.$rpe);
    }