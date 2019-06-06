<?php

namespace App\Http\Controllers;
use App\EncargadoEmpresasPendientes;//aqui va el nombre del modelo
use App\Encargado;
use App\Alumno; 
use App\Empresa;
use App\registroPracticas;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request; 

class EncargadoEmpresasPendientesController extends Controller
{
     public function EncargadoEmpresasPendientes($rpe){
     	$encargado=Encargado::where('rpe','=',$rpe)->first(); // va el nombre del controlador
        
        $Empresa= Empresa::all();
        $fecha = Carbon::now()->formatLocalized('%A %d %B %Y');
        //return json_encode($solicitud);
    	//dd($v); //dd es para hacer pruebas de que si este entrando a la funcion
    	return view('encargadoEmpresasPendientes')->with('encargado',$encargado)->with('Empresa',$Empresa)->with('fecha',$fecha); 
    }
    
  
}
 