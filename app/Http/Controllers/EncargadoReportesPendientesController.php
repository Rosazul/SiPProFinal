<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\EncargadoReportesPendientes;//aqui va el nombre del modelo
use App\Encargado;
use App\Alumno;
use App\Reportes;
use App\registroPracticas;
use Illuminate\Support\Carbon;



class EncargadoReportesPendientesController extends Controller
{
    public function EncargadoReportesPendientes($rpe){
     	$encargado=Encargado::where('rpe','=',$rpe)->first(); // va el nombre del controlador
        $reportes=Reportes::all();
            //dd($reportes);
        $fecha = Carbon::now()->formatLocalized('%A %d %B %Y');
    	return view('encargadoReportesPendientes')->with('encargado',$encargado)->with('fecha',$fecha)->with('reportes',$reportes); 
    }
    public function Elimina($idReporte) //no se necesita poner el tipo del dato
    {
        $s= EncargadoReportesPendientes::find($idReporte);
        $s->delete();

        return redirect('EncargadoReportesPendientes/'.$idReporte);//para regresar a la pagina principal
    }
}
