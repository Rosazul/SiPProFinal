<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\TutorAcademico;
use App\registroPracticas; 
use App\Empresa;
use App\Reportes;
use Illuminate\Support\Carbon;

class datosEmpresaController extends Controller
{
    public function submenuDatosEmpresa($clave)
    {
        $empresa= Empresa::all();
    	$alumno=Alumno::where('claveUnica','=',$clave)->first();
    	$tutor=TutorAcademico::where('id','=',$alumno->idTutorAcademico)->first();
        $fecha = Carbon::now()->formatLocalized('%A %d %B %Y');
        return view('datosEmpresa')->with('alumno',$alumno)->with('fecha',$fecha)->with('tutor',$tutor)->with('empresa',$empresa);
	}

    public function submenuDatosEmpresaConDatos($clave)
    {
        $alumno=Alumno::where('claveUnica','=',$clave)->first();
        $tutor=TutorAcademico::where('id','=',$alumno->idTutorAcademico)->first();
        $fecha = Carbon::now()->formatLocalized('%A %d %B %Y');

        $solicitud = registroPracticas::where('claveUnica','=',$alumno->claveUnica)->first();
        if($solicitud!=null)
        {
            $emp = Empresa::where('idEmpresa','=',$solicitud->idEmpresa)->first();
            $reportes = Reportes::where('idRegistroPracticas','=',$solicitud->idRegistroPracticas)->first();
           // dd($emp);
        }
        return view('datosEmpresaConDatos')->with('alumno',$alumno)->with('fecha',$fecha)->with('tutor',$tutor)->with('emp',$emp)->with('reportes',$reportes)->with('solicitud',$solicitud);

    }
    public function GuardaDatosEmpresa($clave)
    {
        $nombreEmp = request('nombreEmpresachido');
        //dd($nombreEmp);
        $direccion = request('direccionchida');
        $giro = request('girochido');
        $telefonoEmpresa = request('telefonochido');
        //dd($nombreEmp,$direccion,$giro,$telefonoEmpresa);

        $emp = Empresa::where('idEmpresa','=',$nombreEmp)->first();
        $sP=registroPracticas::where('claveUnica','=',$clave)->first();

         $sP->idEmpresa =$emp->idEmpresa;
 //       dd($sP);

        if($sP->guardaDatosEmpresa == false)
        {
          $sP->guardaDatosEmpresa = true;
//          $sP->update(['true' => $sP->guardaDatosEmpresa]);
        }

        $sP->save();

        return redirect('datosAsesor/'.$clave);
    }

    public function GuardaDatosEmpresaModal($clave)
    {

        $sP=registroPracticas::where('claveUnica','=',$clave)->first();

        $nombreEmpresa = request('nombreEmpresa');
        $direccion = request('direccionE');
        $giro = request('giroE');
        $telefonoEmpresa = request('telefonoE');

        $emp = new Empresa();

        $emp->Nombre=$nombreEmpresa;
        $emp->Direccion = $direccion;
        $emp->Giro = $giro;
        $emp->Telefono=$telefonoEmpresa;
        $emp->save(); 

        $sP->idEmpresa = $emp->idEmpresa;
        
        if($sP->guardaDatosEmpresa == false)
        {
          $sP->guardaDatosEmpresa = true;
        }

        $sP->save();

        return redirect('/menuAlumno/'.$clave);
    }

    public function GuardaEmpresaDireccionModal($clave)
    {
        $nombreEmpresa = request('idEmpresa');
        $direccion = request('direccion');
        $giro = request('giro');
        $telefonoEmpresa = request('telefono');

        $emp = Empresa::find($nombreEmpresa);

        $emp->Nombre=$emp->Nombre;
        $emp->Direccion = $direccion;
        $emp->Giro = $giro;
        $emp->Telefono=$telefonoEmpresa;
        $emp->save();

        $sP=registroPracticas::where('claveUnica','=',$clave)->first();
        

        $sP->idEmpresa = $emp->idEmpresa;
        
        
        if($sP->guardaDatosEmpresa == false)
        {
          $sP->guardaDatosEmpresa = true;
          $sP->update(['true' => $sP->guardaDatosEmpresa]);
        }

        $sP->save();

        return redirect('/datosAsesor/'.$clave);
    }
}
