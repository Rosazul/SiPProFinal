<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TutorAcademico;
use App\Alumno;
use App\registroPracticas;
use App\Autorizaciones;
use Illuminate\Support\Carbon;
use App\Empresa;
use App\Asesor;
use App\Encargado;
use App\detalleError;


class AutorizacionesController extends Controller
{
   public function autorizaciones($rpe, $claveUnica)
    {
        $tutor=TutorAcademico::where('rpe','=',$rpe)->first();

        $alumno=Alumno::where('claveUnica','=',$claveUnica)->first();
        $solicitud=registroPracticas::where('claveUnica','=',$alumno->claveUnica)->first();
        $empresa = Empresa::where('idEmpresa','=',$solicitud->idEmpresa)->first();
        $asesor = Asesor::where('idAsesor','=',$solicitud->idAsesor)->first();

        $fecha = Carbon::now()->formatLocalized('%A %d %B %Y');
        $fechaAut = Carbon::now();
        $fechaAut = $fechaAut->format('d-m-Y');

    	return view('autorizaTutorAcademico')->with('tutor',$tutor)->with('solicitud',$solicitud)->with('alumno',$alumno)->with('fecha',$fecha)->with('emp',$empresa)->with('ase',$asesor)->with('fechaAut',$fechaAut);        
    } 

   public function autorizacionesEncargado($rpe, $claveUnica)
    {
        $encargado=Encargado::where('rpe','=',$rpe)->first();

        $alumno=Alumno::where('claveUnica','=',$claveUnica)->first();
        $tutor=TutorAcademico::where('id','=',$alumno->idTutorAcademico)->first();
        $solicitud=registroPracticas::where('claveUnica','=',$alumno->claveUnica)->first();
        $empresa = Empresa::where('idEmpresa','=',$solicitud->idEmpresa)->first();
        $asesor = Asesor::where('idAsesor','=',$solicitud->idAsesor)->first();

        $fecha = Carbon::now()->formatLocalized('%A %d %B %Y');
        $fechaAut = Carbon::now();
        $fechaAut = $fechaAut->format('d-m-Y');

        return view('autorizaEncargado')->with('encargado',$encargado)->with('tutor',$tutor)->with('solicitud',$solicitud)->with('alumno',$alumno)->with('fecha',$fecha)->with('emp',$empresa)->with('ase',$asesor)->with('fechaAut',$fechaAut);        
    } 

    public function GuardaAcreditacionTutor($rpe,$claveUnica)
    {
        $tutor = TutorAcademico::where('rpe','=',$rpe)->first();        

        $alumno=Alumno::where('claveUnica','=',$claveUnica)->first();        

        $comentariotutor = request("Comentarios");

        $fechaAut = Carbon::now();
        $fecha = $fechaAut->format('Y-m-d');

        $status = request("radio");
        $lugarError = request("check");
        
        $sol=registroPracticas::where('claveUnica','=',$alumno->claveUnica)->first();
        $autorizatutor = new Autorizaciones();//objeto para meter los valores al objeto
//        dd($sol);
        $autorizatutor->idRegistroPracticas = $sol->idRegistroPracticas;
        $autorizatutor->rpeTutorAcademico = $tutor->rpe;
        $autorizatutor->comentariosTutorAcademico = $comentariotutor;
        $autorizatutor->fechaAutorizacionTutorAcademico= $fecha;
        // dd($autorizatutor->fechaAutorizacionTutorAcademico);
        $autorizatutor->statusTutorAcademico = $status;
        
        $error = new detalleError();

        if($autorizatutor->statusTutorAcademico == '0')
        {
          $autorizatutor->statusTutorAcademico = 0;
          $error->idRegistroPracticas = $autorizatutor->idRegistroPracticas;
          $error->lugarError = $lugarError;
          $error->comentarios = $autorizatutor->comentariosTutorAcademico;
          $sol->lugarError = $error->lugarError;
        }

        if($autorizatutor->statusTutorAcademico == '1')
        {
          $autorizatutor->statusTutorAcademico = 1;
        }

    	$autorizatutor->save();//para guardar en la base de datos
      $error->save();
      $sol->save();
    	return redirect('TutorAcademicoSolicitudesPendientes/'.$rpe);//para regresar a la pagina principal
    }

    public function GuardaAcreditacionEncargado($rpe,$claveUnica)
    {
        $encargado=Encargado::where('rpe','=',$rpe)->first();
        $alumno=Alumno::where('claveUnica','=',$claveUnica)->first();
        //$solicitud=llenarSolicitud::all();

        $comentarioEncargado = request("Comentarios");

        $fechaAut = Carbon::now();
        $fecha = $fechaAut->format('Y-m-d');

        $status = request("radio");
        $lugarError = request("check");                                                                                                                                            
        $error = new detalleError();
        $sol=registroPracticas::where('claveUnica','=',$alumno->claveUnica)->first();
       // dd($sol);
        $autorizaciones=Autorizaciones::where('idRegistroPracticas','=',$sol->idRegistroPracticas)->first();
     //   dd($autorizaciones->idAutorizacion);
        $autorizaciones->idRegistroPracticas = $sol->idRegistroPracticas;
        $autorizaciones->rpeEncargado = $encargado->rpe;
        $autorizaciones->comentariosEncargado = $comentarioEncargado;
        $autorizaciones->fechaAutorizacionEncargado= $fecha;
        $autorizaciones->statusEncargado = $status;

        if($autorizaciones->statusEncargado == '0')
        {
          $autorizaciones->statusEncargado = 0;
          $error->idRegistroPracticas = $sol->idRegistroPracticas;
          $error->lugarError = $lugarError;
          $error->comentarios = $autorizaciones->comentariosEncargado;
          $sol->lugarError = $error->lugarError;
        }

        if($autorizaciones->statusEncargado == '1')
        {
          $autorizaciones->statusEncargado = 1;
  //        $autorizatutor->update(['true' => $autorizatutor->statusTutorAcademico]);
        }
		// dd($autorizaciones);

    	$autorizaciones->save();//para guardar en la base de datos

        if($autorizaciones->statusEncargado == '1' && $autorizaciones->statusTutorAcademico == '1')
        {
          $sol->statusSolicitud = 'Aprobada';
          $sol->idAcreditacionTutorAcademico = '1';
          $sol->idAcreditacionEncargado = '1';
        }
        if($autorizaciones->statusEncargado == '1' && $autorizaciones->statusTutorAcademico == '0')
        {
          $sol->statusSolicitud = 'No Aprobada';
          $sol->idAcreditacionTutorAcademico = '0';
          $sol->idAcreditacionEncargado = '1';
        }
        if($autorizaciones->statusEncargado == '0' && $autorizaciones->statusTutorAcademico == '1')
        {
          $sol->statusSolicitud = 'No Aprobada';
          $sol->idAcreditacionTutorAcademico = '1';
          $sol->idAcreditacionEncargado = '0';
        }
        if($autorizaciones->statusEncargado == '0' && $autorizaciones->statusTutorAcademico == '0')
        {
          $sol->statusSolicitud = 'No Aprobada';
          $sol->idAcreditacionTutorAcademico = '0';
          $sol->idAcreditacionEncargado = '0';
        }
       $error->save();
        $sol->save();

    	return redirect('encargadoSolicitudesPendientes/'.$rpe);//para regresar a la pagina principal
    }
}