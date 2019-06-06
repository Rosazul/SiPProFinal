<?php

namespace App\Http\Controllers;
use App\TutorAcademico;
use App\Alumno;
use App\Reportes;
use App\AutorizacionesReportes;
use Illuminate\Support\Carbon;
use App\Empresa;
use App\Asesor;
use App\Encargado;
use App\registroPracticas;
use Illuminate\Http\Request;

class AutorizacionesReportesController extends Controller
{
    public function AutorizacionesReportes($rpe, $idReporte)
    {
        $tutor=TutorAcademico::where('rpe','=',$rpe)->first();
       
        $reportes=Reportes::where('idReporte','=',$idReporte)->first();
        $solicitud = registroPracticas::where('idRegistroPracticas','=',$reportes->idRegistroPracticas)->first();
        $alumno = Alumno::where('claveUnica','=',$solicitud->claveUnica)->first();
        $tutor = TutorAcademico::where('id','=',$alumno->idTutorAcademico)->first();
        $emp=Empresa::where('idEmpresa','=',$solicitud->idEmpresa)->first();
        $asesor = Asesor::where('idAsesor','=',$reportes->idAsesor)->first();
    //    dd($reportes);


        $path= storage_path('app/public');
        $path=$path."/".$reportes->nombreArchivo;
        //dd($path);
        $archivoReporte = $path;

        $fecha = Carbon::now()->formatLocalized('%A %d %B %Y');
        $fechaAut = Carbon::now();
        $fechaAut = $fechaAut->format('d-m-Y');
        //dd($rpe);
        return view('autorizaReportesTutorAcademico')->with('tutor',$tutor)->with('registroreporte',$reportes)->with('alumno',$alumno)->with('fecha',$fecha)->with('emp',$emp)->with('ase',$asesor)->with('fechaAut',$fechaAut)->with('archivo',$archivoReporte)->with('solicitud',$solicitud);        
    } 
    public function AutorizacionesReportesEncargado($rpe, $idReporte)
    {
        $encargado=Encargado::where('rpe','=',$rpe)->first();

        $reportes=Reportes::where('idReporte','=',$idReporte)->first();
        $solicitud = registroPracticas::where('idRegistroPracticas','=',$reportes->idRegistroPracticas)->first();
        $alumno = Alumno::where('claveUnica','=',$solicitud->claveUnica)->first();
        $tutor = TutorAcademico::where('id','=',$alumno->idTutorAcademico)->first();
        $emp=Empresa::where('idEmpresa','=',$solicitud->idEmpresa)->first();
        $asesor = Asesor::where('idAsesor','=',$reportes->idAsesor)->first();
    //    dd($reportes);

        $path= storage_path('app/public');
        $path=$path."/".$reportes->nombreArchivo;
        //dd($path);
        $archivoReporte = $path;

        $fecha = Carbon::now()->formatLocalized('%A %d %B %Y');
        $fechaAut = Carbon::now();
        $fechaAut = $fechaAut->format('d-m-Y');
        //dd($rpe);
        return view('autorizaReportesEncargado')->with('encargado',$encargado)->with('registroreporte',$reportes)->with('fecha',$fecha)->with('emp',$emp)->with('ase',$asesor)->with('fechaAut',$fechaAut)->with('alumno',$alumno)->with('tutor',$tutor)->with('solicitud',$solicitud)->with('archivo',$archivoReporte);        
    }

    public function getDownload($idReporte)
    {
        $reportes=Reportes::where('idReporte','=',$idReporte)->first();
    //PDF file is stored under project/public/download/info.pdf
        $path= storage_path('app/public');
        $path=$path."/".$reportes->nombreArchivo;
        //dd($path);
        $archivoReporte = $path;

      /*  $headers = array(
              'Content-Type: Desktop/Reportes',
            );*/

        return response()->download($archivoReporte);
    }

    public function GuardaAcreditacionReportesTutor($rpe,$idReporte)
    {
        $tutor = TutorAcademico::where('rpe','=',$rpe)->first();        

        $reportes=Reportes::where('idReporte','=',$idReporte)->first();        
//dd($idReporte);
        $registroreporte=registroPracticas::where('idRegistroPracticas','=',$reportes->idRegistroPracticas)->first();
        $alumno=Alumno::where('claveUnica','=',$registroreporte->claveUnica)->first();

        $comentariotutor = request("Comentarios");

        $fecha = Carbon::now();
        $fechaAutorizacion = $fecha;

        $status = request("radio");
        
        
        $autorizatutor = new AutorizacionesReportes();//objeto para meter los valores al objeto
//        dd($sol);
        $autorizatutor->idRegistroPracticas = $reportes->idRegistroPracticas;
        $autorizatutor->idReporte = $reportes->idReporte;
        $autorizatutor->rpeTutorAcademico = $tutor->rpe;
        $autorizatutor->comentariosTutorAcademico = $comentariotutor;
        $autorizatutor->fechaAutorizacionTutorAcademico= $fechaAutorizacion;
        $autorizatutor->statusTutorAcademico = $status;

        if($autorizatutor->statusTutorAcademico == '0')
        {
          $autorizatutor->statusTutorAcademico = 0;
//          $autorizatutor->update(['false' => $autorizatutor->statusTutorAcademico]);
        }

        if($autorizatutor->statusTutorAcademico == '1')
        {
          $autorizatutor->statusTutorAcademico = 1;
  //        $autorizatutor->update(['true' => $autorizatutor->statusTutorAcademico]);
        }
     //   dd($autorizatutor);

        //dd($autorizatutor);
    	$autorizatutor->save();//para guardar en la base de datos

    	return redirect('tutorAcademicoReportesPendientes/'.$rpe);//para regresar a la pagina principal
    }

    public function GuardaAcreditacionReportesEncargado($rpe,$idReporte)
    {
        $encargado=Encargado::where('rpe','=',$rpe)->first();

        $reportes=Reportes::where('idReporte','=',$idReporte)->first();        

        $registropracticas=registroPracticas::where('idRegistroPracticas','=',$reportes->idRegistroPracticas)->first();
        $alumno=Alumno::where('claveUnica','=',$registropracticas->claveUnica)->first();

        $comentarioEncargado = request("Comentarios");

        $fecha = Carbon::now();
        $fechaAutorizacion = $fecha;

        $status = request("radio");

        $path=storage_path('app/public');
        $path=$path."/".$reportes->nombreArchivo;
        //dd($path);
        $autorizaciones=AutorizacionesReportes::where('idReporte','=',$reportes->idReporte)->first();
        // dd($autorizaciones);

        $autorizaciones->idReporte = $autorizaciones->idReporte;
        // dd($autorizaciones->idAutorizacionReportes);
        $autorizaciones->rpeEncargado = $encargado->rpe;
        $autorizaciones->comentariosEncargado = $comentarioEncargado;
        $autorizaciones->fechaAutorizacionEncargado= $fechaAutorizacion;
        $autorizaciones->statusEncargado = $status;

        if($autorizaciones->statusEncargado == '0')
        {
          $autorizaciones->statusEncargado = 0;
//          $autorizatutor->update(['false' => $autorizatutor->statusTutorAcademico]);
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
          $reportes->statusReporte = 'Aprobado';
  //        $autorizatutor->update(['true' => $autorizatutor->statusTutorAcademico]);
        }
        if($autorizaciones->statusEncargado == '1' && $autorizaciones->statusTutorAcademico == '0')
        {
          $reportes->statusReporte = 'No Aprobado';
  //        $autorizatutor->update(['true' => $autorizatutor->statusTutorAcademico]);
        }
        if($autorizaciones->statusEncargado == '0' && $autorizaciones->statusTutorAcademico == '1')
        {
          $reportes->statusReporte = 'No Aprobado';
  //        $autorizatutor->update(['true' => $autorizatutor->statusTutorAcademico]);
        }
        if($autorizaciones->statusEncargado == '0' && $autorizaciones->statusTutorAcademico == '0')
        {
          $reportes->statusReporte = 'No Aprobado';
  //        $autorizatutor->update(['true' => $autorizatutor->statusTutorAcademico]);
        }
        $reportes->save();
 

    	return redirect('encargadoReportesPendientes/'.$rpe);//para regresar a la pagina principal
    }
}
