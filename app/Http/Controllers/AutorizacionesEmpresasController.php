<?php

namespace App\Http\Controllers;
use App\EncargadoEmpresasPendientes;//aqui va el nombre del modelo
use App\Alumno;
use App\AutorizacionEmpresa;
use Illuminate\Support\Carbon;
use App\Empresa;
use App\Asesor;
use App\Encargado;
use App\registroPracticas;
use Illuminate\Http\Request;


class AutorizacionesEmpresasController extends Controller
{
    
    public function AutorizacionesEmpresasEncargado($rpe, $idEmpresa)
    {
        $encargado=Encargado::where('rpe','=',$rpe)->first();

        $alumno=registroPracticas::where('idEmpresa','=',$idEmpresa)->first();
//        dd($alumno);
        $datoAlumno = Alumno::where('claveUnica','=',$alumno->claveUnica)->first();
       $emp = Empresa::where('idEmpresa','=',$alumno->idEmpresa)->first();
//       dd($emp);
//         $regempresa=registroPracticas::where('claveUnica','=',$alumno->claveUnica)->first();
       // dd($alumno);       
//        $emp=Empresa::where('idEmpresa','=',$regempresa->idEmpresa)->first();
        $fecha = Carbon::now()->formatLocalized('%A %d %B %Y');
        $fechaAut = Carbon::now();
        $fechaAut = $fechaAut->format('d-m-Y');
        //dd($rpe);
        return view('autorizaEmpresasEncargado')->with('encargado',$encargado)->with('registroempresa',$alumno)->with('alumno',$datoAlumno)->with('fecha',$fecha)->with('fechaAut',$fechaAut)->with('encargado',$encargado)->with('emp',$emp);        
    }


    public function GuardaAcreditacionEmpresasEncargado($rpe,$idEmpresa)
    {
        $encargado=Encargado::where('rpe','=',$rpe)->first();
        $alumno=registroPracticas::where('idEmpresa','=',$idEmpresa)->first();
        $emp = Empresa::where('idEmpresa','=',$alumno->idEmpresa)->first();
 
        $datoAlumno = Alumno::where('claveUnica','=',$alumno->claveUnica)->first();
//        dd($alumno);

        $comentarioEncargado = request("Comentarios");

        $fecha = Carbon::now();
        $fechaAutorizacion = $fecha;

        $status = request("radio");
       
        $autorizaciones= new AutorizacionEmpresa();

        $autorizaciones->idRegistroPracticas = $alumno->idRegistroPracticas;
        $autorizaciones->rpeEncargado = $encargado->rpe;
        $autorizaciones->comentariosEncargado = $comentarioEncargado;
        $autorizaciones->fechaAutorizacionEncargado= $fechaAutorizacion;
        $autorizaciones->statusEncargado = $status;
       // dd($autorizaciones);

        if($autorizaciones->statusEncargado == '0')
        {
          $autorizaciones->statusEncargado = 0;
          $emp->registrada = 0;
        }

        if($autorizaciones->statusEncargado == '1')
        {
          $autorizaciones->statusEncargado = 1;
          $emp->registrada = 1;
        }
        $emp->save();
    	$autorizaciones->save();//para guardar en la base de datos

    	return redirect('encargadoEmpresasPendientes/'.$rpe);//para regresar a la pagina principal
    }
}
