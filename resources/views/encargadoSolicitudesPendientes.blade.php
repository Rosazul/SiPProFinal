<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Index</title>
  <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/estilos.css">
</head>
<body>
  
<div class="container">
    <div class="encabezado">
      <img src="/logoRojo.jpg" alt="">
    </div><!--DIV ENCABEZADO-->
    <!--DIV de los datos generales del alumno-->
    <div class="tutorDiv"> <!--inicio del div contenedor de datos y de la foto-->
       <!-- <img src="/usuario.png" style="position: relative; left:100px; width: 15%">-->
      <div class="tutorDiv2"> <!--DIV QUE CONTIENE LOS DATOS GENERALES DEL ALUMNO-->
      
        <div class="row rowRPE" >
          <div class="col-3 colRPE" > RPE:
          </div>
          <div class="col-4">
             <label> {{$encargado->rpe}}</label>
          </div>
          <div class="col-5 colFecha" > Fecha: {{$fecha}}
          </div>
        </div>
        <div class="row">
          <div class="col-3 colBienvenido"> BIENVENIDO:
          </div>
          <div class="col-5">
            <label>  {{$encargado->nombre}}</label>            
          </div>
          <div class="col-4 colNombreTutor" >
          </div><!--aqui iba situaciÃ³n-->
        </div>        
     </div> <!-- FIN DEL DIV QUE CONTIENE LOS DATOS GENERALES DEL ALUMNO-->
    </div>
  <!--fin del div contenedor de datos y de la foto-->


    <div class="menuTutor" style="height: 60px">
      <ul><!--primer ul--->
        <li class="menuitem" style="height: 180px" >
          <a href="#">Prácticas Profesionales
           </a>
          <ul class="submenuRegistroTutor" >
              <li style=""> 
                  <a href="/encargadoSolicitudesPendientes/{{$encargado->rpe}}">SOLICITUDES Pendientes de Autorizar</a>
              </li>
          </ul>
            <ul class="submenuRegistroTutor" >
              <li>
                    <a href="/encargadoReportesPendientes/{{$encargado->rpe}}">REPORTES Pendientes de Autorizar</a>
              </li>  
          </ul>


          <ul class="submenuRegistroTutor" >
              <li>
                    <a href="/encargadoEmpresasPendientes/{{$encargado->rpe}}">EMPRESAS Pendientes de Autorizar</a>
              </li>  
          </ul>
         
        </li>

        <li class="menuitem" style="height: 180px">
          <a href="#">Proceso de Prácticas Profesionales</a>
          <ul class="submenuRegistro" s>
              <li><a href="#" >Diagrama de Proceso</a>
              </li>   
          </ul>
        </li>
        <li class="menuitem" style="height: 180px">
          <a href="/ayuda/{{$encargado->rpe}}" data-toggle="modal" data-target="#ayuda">Ayuda</a>
        </li>
        <li class="menuitem" style="height: 180px">
          <a href="/">Cerrar Sesión</a>
        </li>
      </ul><!--fin del primer ul--->
    </div><!--fin div menu--->

   <!------------------------------------------------------------------------>
   <!-------------------------------------------------------------------------------->
   <form class="formTutorSolP" action="">
    <div class="tituloDatosTutor">
        <p>ALUMNOS CON SOLICITUDES PENDIENTES</p>
      </div><!--DIV TITULO DATOS ASESOR--> 
      <div class="tituloDatosTutor2">
        <p>RESULTADO DE LA BÚSQUEDA</p>
      </div><!--DIV TITULO DATOS ASESOR-->  
        <!--DIV que contiene los datos que se le piden al asesor-->
        <div class="Tutor">
          <table class="tableSolPend" align="center" >
            <tbody>
              <tr class="trClaveUnica">
                 <td class="tdClaveUnica" cellspacing="60" >Clave Unica:</td>
                 <td class="tdNombre">Nombre del Alumno: </td>
                 <td class="tdSolicitud">Solicitud: </td>
              </tr>
              @foreach($solicitud as $sol)
                @if($sol->statusSolicitud == 'En Proceso')
                  <tr>
                      <th>{{$sol->claveUnica}}</th>
                      <th>{{$sol->alumno->Nombre}}</th><!--Aqui va el nombre del alumno-->
                      <th><a href="/autorizaEncargado/{{$encargado->rpe}}/{{$sol->claveUnica}}">Ver</a></th>
                      <th><a href="/Elimina/{{$sol->idRegistroPracticas}}">Eliminar</a></th>
                  <tr></tr>
                  </tr>
              @endif
              @endforeach  
            </tbody>
          </table>
           
                 
        </div>  <!--DIV Asesor--> 

        <div class="piePagina">
      <p class="texto">Facultad de Ingeniería, UASLP <br>
      Dr. Manuel Nava # 8, Zona Universitaria poniente <br>
         Tels. (444) 826.2330 al 2339
         http://ingenieria.uaslp.mx    
   </p>
      
    </div>   
    </form>

   <div class="modal fade" id="ayuda" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                      <h3>Diagrama de Procesos</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               </div>
               <div class="modal-body">
                  <div class="imgDiagramaProcesos">
                   <img src="/diagramaProcesos.jpg"> 
                  </div>
             </div>
               <div class="modal-footer">
                <!-- <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a> -->
               </div>
            </div>
        </div>
    </div><!--DIV MODAL-->

     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </div><!--container-->
</body>

</html>