<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Index</title>
  <link rel="stylesheet" href="/css/estilos.css">
  <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script>

    $(document).ready(function()
    {
       $("#mostrarmodalReporte").modal("show");
    });

    $(document).ready(function()
    {
       $("#mostrarmodal").modal("show");
    });
    
  </script>
  
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
  
<div class="container">

  
    @if(isset($solicitud))
      <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                      <h3>Estado de la Solicitud</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               </div>
               <div class="modal-body">
                
                  <p class="texto-modal">El Estado de la Solicitud de las Prácticas Profesionales se encuentra {{$solicitud->statusSolicitud}}</p>
                
             </div>
               <div class="modal-footer">
                @if($solicitud->lugarError == '0')
                  <a href="#" data-dismiss="modal" class="btn btn-danger">Aceptar</a>
                @endif
                @if($solicitud->lugarError == '1')
                  <a href="/datosPracticasProfesionales/{{$alumno->claveUnica}}" class="btn btn-success">Aceptar</a>
                @endif
                @if(($solicitud->lugarError == '2')||($emp->registrada == '2'))
                  <a href="/datosEmpresa/{{$alumno->claveUnica}}" class="btn btn-warning">Aceptar</a>
                @endif
                @if($solicitud->lugarError == '3')
                  <a href="/datosAsesor/{{$alumno->claveUnica}}" class="btn btn-danger">Aceptar</a>
                @endif
               </div>
            </div>
        </div>
      </div><!--DIV MODAL-->
    @endif

      @if(isset($reportes))
      <div class="modal fade" id="mostrarmodalReporte" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                      <h3>Estado del Reporte</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               </div>
               <div class="modal-body">
                @foreach($reportes as $repo)
                  @if($repo->idRegistroPracticas == $solicitud->idRegistroPracticas)
                    <p class="texto-modal">El Estado del Reporte {{$repo->numReporte}} es {{$repo->statusReporte}}</p>
                  @endif
                @endforeach
             </div>
               <div class="modal-footer">
                  <a href="#" data-dismiss="modal" class="btn btn-danger">Aceptar</a>
               </div>
            </div>
        </div>
      </div><!--DIV MODAL-->
    @endif


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
          <div class="col-4">
              <label name="clave">{{$alumno->claveUnica}}</label>
          </div>
          <div class="col-5 columna1" style="background-color: rgb(26,50,86);">Fecha:{{$fecha}}
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
    <div class="menu">
     
        <ul><!--primer ul--->
          <li class="menuitem" >
            <a href="#" >Registrar Solicitud</a>
             <ul class="submenu">
               <li>
                @if(!isset($solicitud))
                  <a href="/datosPracticasProfesionales/{{$alumno->claveUnica}}">Datos Practicas Profesionales
                  </a>
                @endif 
                @if(isset($solicitud)&&($solicitud->guardaDatosPracticas == '1'))
                  <a href="/datosPracticasProfesionalesConDatos/{{$alumno->claveUnica}}">Datos Practicas Profesionales
                  </a>
                @endif
               </li>
                <li>
                @if(!isset($solicitud)||($solicitud->guardaDatosEmpresa=='0'))
                  <a href="/datosEmpresa/{{$alumno->claveUnica}}">Datos de la Empresa
                  </a>
                @endif 
                @if(isset($solicitud)&&($solicitud->guardaDatosEmpresa == '1'))
                  <a href="/datosEmpresaConDatos/{{$alumno->claveUnica}}">Datos de la Empresa
                  </a>
                @endif
                </li>
                <li>
                @if(!isset($solicitud)||($solicitud->guardaDatosAsesor=='0'))
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
          <li class="menuitem">
              <a href="/alumnoAutorizaciones/{{$alumno->claveUnica}}" >Autorizaciones</a>
          </li>            
        @endif

        @if(isset($solicitud))
        @if($solicitud->claveUnica == $alumno->claveUnica)
        @if(isset($repo))
            <li class="menuitem">
                <a href="/alumnoAutorizacionesReportes/{{$alumno->claveUnica}}" >Autorizaciones Reportes</a>
            </li> 
          @endif
          @endif
        @endif

        @if(isset($solicitud))
          @if($emp->status == 'No Autorizada')
            <li class="menuitem">
                <a href="/AutorizacionesEmpresa/{{$alumno->claveUnica}}" >Autorizaciones Empresas</a>
            </li> 
            @endif
        @endif

        @if(isset($reportes))
          @foreach($reportes as $repo)
            @if($repo->idRegistroPracticas == $solicitud->idRegistroPracticas)
              @if(($repo->numReporte == 'REPORTE FINAL')&&($repo->statusReporte == 'Aprobado'))
                <li class="menuitem">
                  <a href="/EvaluacionAlumnoEmpresa/{{$alumno->claveUnica}}">Evaluacion</a>
                </li>
              @endif
            @endif
          @endforeach
        @endif

        
        <li class="menuitem">
          <a href="/ayuda/{{$alumno->claveUnica}}" data-toggle="modal" data-target="#ayuda">Ayuda</a>
        </li>
        <li class="menuitem" >
          <a style="left:90px "href="/">Cerrar Sesión</a>
        </li>
      </ul><!--fin del primer ul--->
    </div>
    <!---FIN DIV MENU---> 
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
  </div>
</body>
</html>