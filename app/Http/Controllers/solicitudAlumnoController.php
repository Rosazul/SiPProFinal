<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\TutorAcademico;
use App\registroPracticas;
use App\Empresa;

use Illuminate\Support\Carbon;

class solicitudAlumnoController extends Controller
{
    public function solicitudAlumno($clave)
    {
    	$alumno=Alumno::where('claveUnica','=',$clave)->first();
    	$tutor=TutorAcademico::where('id','=',$alumno->idTutorAcademico)->first();
    	//dd($asesor);
        $fecha = Carbon::now()->formatLocalized('%A %d %B %Y');


        $empresa = Empresa::all();

    	// $alumno=registroAlumno::find($claveUnicaUnica);
    	//dd($v); //dd es para hacer pruebas de que si este entrando a la funcion
    	return view('solicitudAlumno')->with('alumno',$alumno)->with('fecha',$fecha)->with('tutor',$tutor)->with('empresa',$empresa);
	}    
   public function GuardaDatosPracticas($clave)
    {
        $alumno=Alumno::where('claveUnica','=',$clave)->first();
        $tutor=TutorAcademico::where('id','=',$alumno->idTutorAcademico)->first();
        //dd($asesor);
        $tipoPractica = request('tipoPracticas');
        $horaEntrada = request('horaEntrada');
        $horaSalida = request('horaSalida');

        $fechaInicio = request('fechaInicio');
        $fechaFin = request('fechaFin');
        $actividades = request('acts');

        $sP = new registroPracticas();//objeto para meter los valores al objeto

        $sP->claveUnica = $alumno->claveUnica;
        $sP->tipoPracticas = $tipoPracticas;
        $sP->horaEntrada = $horaEntrada;
        $sP->horaSalida = $horaSalida;
        $sP->fechaInicio = $fechaInicio;
        $sP->fechaFin = $fechaFin;
        $sP->actividad = $acts;

        $sP->save();

        return redirect('solicitudPracticas')->with('datosPracticas',$sP);
    }

    public function GuardaDatosEmpresa($clave)
    {
        $nombreEmpresa = request('idEmpresa');
        $direccion = request('direccion');
        $giro = request('giro');
        $telefonoEmpresa = request('telefonoEmpresa');
        //dd($asesor);
        $empresa = new Empresa();//objeto para meter los valores al objeto

        $empresa->Nombre = $nombreEmpresa;
        $empresa->Direccion = $direccion;
        $empresa->Giro = $giro;
        $empresa->Telefono = $telefonoEmpresa;

        $empresa->save();

        return redirect('solicitudPracticas')->with('datosPracticas',$sP);
    }

    public function GuardaDatosAsesor($clave)
    {
        $alumno=Alumno::where('claveUnica','=',$clave)->first();
        $tutor=TutorAcademico::where('id','=',$alumno->idTutorAcademico)->first();
        //dd($asesor);
        $sP = new registroPracticas();//objeto para meter los valores al objeto

        $sP->claveUnica = $alumno->claveUnica;
        $sP->tipoPracticas = $tipoPracticas;
        $sP->horaEntrada = $horaEntrada;
        $sP->horaSalida = $horaSalida;
        $sP->fechaInicio = $fechaInicio;
        $sP->fechaFin = $fechaFin;
        $sP->actividad = $acts;

        $sP->save();

        return redirect('solicitudPracticas')->with('datosPracticas',$sP);
    }
}
