<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="/css/estilos.css">
  <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
  <div class="container">
     <div class="encabezado">
      <img src="/logoRojo.jpg" alt="">
    </div><!--DIV ENCABEZADO-->
    <!--DIV de los datos generales del alumno-->
    <div class="contenedorDatos"> <!--inicio del div contenedor de datos y de la foto-->
        <img src="/usuario.png">
      <div  class="DatosGenerales"> <!--DIV QUE CONTIENE LOS DATOS GENERALES DEL ALUMNO-->
        <div class="row fila1">
          <div class="col-3 columna1"> Clave UASLP:
          </div>
          <div class="col-5">
              <label name="clave">{{$alumno->claveUnica}}</label>
          </div>
          <div class="col-4 columna1" style="background-color: rgb(26,50,86);">Fecha:{{$fecha}} </div>
          <div class="col-8">
          </div>
        </div>

        <div class="row fila1">
          <div class="col-3 columna1">Clave Ingenier&iacutea:</div>
          <div class="col-5">
              <label>{{$alumno->claveIngenieria}}</label>
          </div>
          <div class="col-4"></div>
        </div>

        <div class="row fila1">
          <div class="col-3 columna1"> Nombre:
          </div>
          <div class="col-5">
              <label name="nombre">{{$alumno->Nombre}}</label>
          </div>
          <div class="col-4 colfecha"></div><!--aqui iba situaciÃ³n-->
        </div>

        <div class="row fila1">
          <div class="col-3 columna1">Carrera: </div>
          <div class="col-5">
              <label name="carrera">{{$alumno->carrera}}</label>
          </div>
          <div class="col-4"></div>
        </div>

        <div class="row fila1">
          <div class="col-3 columna1">Asesor: </div>
          <div class="col-5">
              <label>{{$tutor->Nombre}}</label>
          </div>
          <div class="col-4 columna2"></div><!--aqui iba condicion-->
        </div>
        
        <div class="row fila1">
          <div class="col-3 columna1">Semestre: </div>
          <div class="col-5">
              <label>{{$alumno->semestre}}</label>
          </div>
          <div class="col-4"></div>
        </div>
     </div> <!-- FIN DEL DIV QUE CONTIENE LOS DATOS GENERALES DEL ALUMNO-->
    </div>
  <!--fin del div contenedor de datos y de la foto-->

      <!---INICIO MENU--->
    <div class="menu" style="height:55px">
     
        <ul><!--primer ul--->
          <li class="menuitem" >
            <a href="#" >Registrar Solicitud</a>
             <ul class="submenu">
               <li>
                @if(!isset($solicitud)&&($solicitud->guardaDatosPracticas == '0'))
                  <a href="/datosPracticasProfesionales/{{$alumno->claveUnica}}">Datos Practicas Profesionales
                  </a>
                @endif 
                @if(isset($solicitud)&&($solicitud->guardaDatosPracticas == '1'))
                  <a href="/datosPracticasProfesionalesConDatos/{{$alumno->claveUnica}}">Datos Practicas Profesionales
                  </a>
                @endif
               </li>
                <li>
                @if(!isset($solicitud)&&($solicitud->guardaDatosEmpresa == '0'))
                  <a href="/datosEmpresa/{{$alumno->claveUnica}}">Datos de la Empresa
                  </a>
                @endif 
                @if(isset($solicitud)&&($solicitud->guardaDatosEmpresa == '1'))
                  <a href="/datosEmpresaConDatos/{{$alumno->claveUnica}}">Datos de la Empresa
                  </a>
                @endif
                </li>
                <li>
                @if(!isset($solicitud)&&($solicitud->guardaDatosAsesor == '0'))
                  <a href="/datosAsesor/{{$alumno->claveUnica}}">Datos del Asesor
                  </a>
                @endif 
                @if(isset($solicitud)&&($solicitud->guardaDatosAsesor == '1'))
                  <a href="/datosAsesorConDatos/{{$alumno->claveUnica}}">Datos del Asesor
                  </a>
                @endif 
                </li>
            </ul>
        </li>
        
        @if(isset($solicitud))
          @if($solicitud->statusSolicitud == "Aprobada")
              <li class="menuitem" >
                  <a href="/reportes/{{$alumno->claveUnica}}" >Subir Reportes</a>
              </li>            
          @endif
        @endif
          @if((isset($solicitud->idAcreditacionTutorAcademico)) && (isset($solicitud->idAcreditacionTutorAcademico)))
            <li class="menuitem" >
                <a href="/alumnoAutorizaciones/{{$alumno->claveUnica}}" >Autorizaciones <br> de la Solicitud</a>
            </li>            
          @endif

        @if(isset($solicitud))
        @if(isset($reportes))
          <li class="menuitem">
              <a href="/alumnoAutorizacionesReportes/{{$alumno->claveUnica}}" >Autorizaciones Reportes</a>
          </li>            
        @endif
        @endif

          @if(isset($reportes)&&($reportes->numReporte == 'REPORTE FINAL')))
           <li class="menuitem">
            <a href="/EvaluacionAlumnoEmpresa/{{$alumno->claveUnica}}">Evaluacion</a>
          </li>
          @endif
        
        <li class="menuitem">
          <a href="/ayuda/{{$alumno->claveUnica}}" data-toggle="modal" data-target="#ayuda">Ayuda</a>
        </li>
        <li class="menuitem" >
          <a href="/">Cerrar Sesión</a>
        </li>
      </ul><!--fin del primer ul--->
    </div>
    <!---FIN DIV MENU---> 

      <!--DIV PARA EL LLENADO DE LA SOLICITUD-->
    <div class="tituloAutorizaciones">
      <p class="textoAutorizaciones">AUTORIZACIONES</p>
    </div><!--DIV titulo-->
    <div class="tituloDatosTutorAcademico">
      <p>TUTOR ACADÉMICO</p>
    </div>
           <!--DIV  que contiene los datos que se le piden al alumno para subir el reporte-->
    <div class="datosAutorizaciones" style="background-color: (198,217,241)">
      <div class="row fechaAutorizacionTutor"><!--DIV row1-->
        <div class="col-3 colum1 -sm tituloFechaAutorizacionTutor">Fecha de Autorización: </div>
          <div class="col-5 labeltutor">
            <label>{{$alAutorizacion->fechaAutorizacionTutorAcademico}}</label>
          </div>                  
       </div><!--DIV row1-->
        
      <div class="row divComentariosTutor"><!--DIV row4-->
        <div class="col-3 colum11 -sm textoComentariosTutor" style="background-color: rgb(26,50,86);text-align: left">Comentarios: </div>
        <div class="col-9 labelcomentarios -sm">
            <label>{{$alAutorizacion->comentariosTutorAcademico}}</label>
        </div>
      </div><!--DIV row4--> 

      <div class="tituloEncargado1">
        <p>ENCARGADO PRÁCTICAS</p>
      </div>
          <!--DIV que contiene los datos que se le piden al alumno para subir el reporte-->
      <div class="autorizacionEncargado">
        <div class="row datosFechaAutorizacionEncargado"><!--DIV row1-->
          <div class="col-3 colum1 -sm textoFechaEncargado">Fecha de Autorización: </div>
            <div class="col-5 actividades2">
              <label>{{$alAutorizacion->fechaAutorizacionEncargado}}</label>
            </div>
        </div><!--DIV row1-->
        
        <div class="row ComentariosEncargado"><!--DIV row4-->
          <div class="col-3 colum11 -sm textoComentariosEncargado" style="  background-color: rgb(26,50,86); text-align: left ">
            <p>Comentarios: </p>
          </div>
          <div class="col-9 actividades1 -sm">
              <label>{{$alAutorizacion->comentariosEncargado}}</label>
          </div>
        </div><!--DIV row4--> 
      </div>
    </div>  
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