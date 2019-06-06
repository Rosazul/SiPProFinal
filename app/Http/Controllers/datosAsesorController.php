<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\TutorAcademico;
use App\registroPracticas;
use App\Asesor;
use App\Reportes;
use Illuminate\Support\Carbon;

use App\Mail\CorreoEvaluacion;
use App\Mail\CorreoReporte;
use App\Mail\CorreoSolicitud;
use Illuminate\Support\Facades\Mail;

class datosAsesorController extends Controller
{
    public function submenuDatosAsesor($clave)
    {
        $alumno=Alumno::where('claveUnica','=',$clave)->first();
        $tutor=TutorAcademico::where('id','=',$alumno->idTutorAcademico)->first();
        //dd($asesor);
        $fecha = Carbon::now()->formatLocalized('%A %d %B %Y');

        // $alumno=registroAlumno::find($claveUnicaUnica);
        //dd($v); //dd es para hacer pruebas de que si este entrando a la funcion
        return view('datosAsesor')->with('alumno',$alumno)->with('fecha',$fecha)->with('tutor',$tutor);
    }
 
    public function submenuDatosAsesorConDatos($clave)
    {
        $alumno=Alumno::where('claveUnica','=',$clave)->first();
        $tutor=TutorAcademico::where('id','=',$alumno->idTutorAcademico)->first();
        //dd($asesor);
        $fecha = Carbon::now()->formatLocalized('%A %d %B %Y');
        $solicitud = registroPracticas::where('claveUnica','=',$alumno->claveUnica)->first();
        $ase = Asesor::where('idAsesor','=',$solicitud->idAsesor)->first();
        $reportes = Reportes::where('idRegistroPracticas','=',$solicitud->idRegistroPracticas)->first();
        //dd($ase);
        // $alumno=registroAlumno::find($claveUnicaUnica);
        //dd($v); //dd es para hacer pruebas de que si este entrando a la funcion
        return view('datosAsesorConDatos')->with('alumno',$alumno)->with('fecha',$fecha)->with('tutor',$tutor)->with('ase',$ase)->with('solicitud',$solicitud)->with('reportes',$reportes);
    }

    public function GuardaDatosAsesor($clave)
    {
        $alumno=Alumno::where('claveUnica','=',$clave)->first();
        $tutor=TutorAcademico::where('id','=',$alumno->idTutorAcademico)->first();
        $nombre = request("nombreAsesor");
        $cargo = request("cargo");
        $telefono = request("telefonoAsesor");
        $tipo = request("tipoAsesor");
        $correo = request("emailAsesor");
        //dd($asesor);
        $as = new Asesor();

        $as->Nombre = $nombre;
        $as->Correo = $correo;
        $as->Telefono = $telefono;
        $as->Puesto = $cargo;
        $as->TipoAsesor = $tipo;

        $as->save();
//dd($as);        
        
        $sP=registroPracticas::where('claveUnica','=',$clave)->first();

        $sP->idAsesor = $as->idAsesor;
        //dd($sP);
        if($sP->guardaDatosAsesor == false)
        {
          $sP->guardaDatosAsesor = true;
          $sP->update(['true' => $sP->guardaDatosAsesor]);
        }
        
        if($sP->statusSolicitud == 'No Hay Solicitud')
        {
          $sP->statusSolicitud = 'En Proceso';
          $sP->update(['En Proceso' => $sP->statusSolicitud]);
        }

        $sP->save();
        Mail::to($tutor->correo)->send(new CorreoSolicitud());

        return redirect('menuAlumno/'.$clave);
    }
}
