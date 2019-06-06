<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\TutorAcademicoReportesPendientes;//aqui va el nombre del modelo
use App\TutorAcademico;
use App\Alumno;
use App\Reportes;
use App\registroPracticas;
use Illuminate\Support\Carbon;



class TutorAcademicoReportesPendientesController extends Controller
{
     public function TutorAcademicoReportesPendientes($rpe){
        $tutor=TutorAcademico::where('rpe','=',$rpe)->first(); // va el nombre del controlador

        $reportes=Reportes::all();
            $fecha = Carbon::now()->formatLocalized('%A %d %B %Y');
        //return json_encode($solicitud);
        //dd($v); //dd es para hacer pruebas de que si este entrando a la funcion
            return view('tutorAcademicoReportesPendientes')->with('tutor',$tutor)->with('fecha',$fecha)->with('reportes',$reportes); 
    }
    public function Elimina($idReporte) //no se necesita poner el tipo del dato
    {
        $s= TutorAcademicoReportesPendientes::find($idReporte);
        $s->delete();

        return redirect('tutorAcademicoReportesPendientes/'.$idReporte);//para regresar a la pagina principal
    }
}
