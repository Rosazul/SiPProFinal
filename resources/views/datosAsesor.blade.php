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
    <div class="contenedorDatos"> <!--inicio del div contenedor de datos y de la foto-->
        <img src="/usuario.png">
      <div  class="DatosGenerales"> <!--DIV QUE CONTIENE LOS DATOS GENERALES DEL ALUMNO-->
        <div class="row fila1">
          <div class="col-3 columna1"> Clave UASLP:
          </div>
          <div class="col-4">
              <label name="clave">{{$alumno->claveUnica}}</label>
          </div>
          <div class="col-5 columna1" style="background-color: rgb(26,50,86)">Fecha:{{$fecha}} </div>
          <div class="col-8">
              <label>{{$fecha}}</label>
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
                @if(!isset($solicitud))
                  <a href="/datosPracticasProfesionales/{{$alumno->claveUnica}}">Llenar Datos Practicas Profesionales
                  </a>
                @endif 
                @if(isset($solicitud)&&($solicitud->guardaDatosPracticas == '1'))
                  <a href="/datosPracticasProfesionalesConDatos/{{$alumno->claveUnica}}">Datos Practicas Profesionales
                  </a>
                @endif
               </li>
                <li>
                @if(!isset($solicitud))
                  <a href="/datosEmpresa/{{$alumno->claveUnica}}">Llenar Datos de la Empresa
                  </a>
                @endif 
                @if(isset($solicitud)&&($solicitud->guardaDatosEmpresa == '1'))
                  <a href="/datosEmpresaConDatos/{{$alumno->claveUnica}}">Datos de la Empresa
                  </a>
                @endif
                </li>
                <li>
                @if(!isset($solicitud))
                  <a href="/datosAsesor/{{$alumno->claveUnica}}">Datos del Asesor
                  </a>
                @endif 
                @if(isset($solicitud)&&($solicitud->guardaDatosAsesor == '1'))
                  <a href="/datosAsesorConDatos/{{$alumno->claveUnica}}">Llenar Datos del Asesor
                  </a>
                @endif 
                </li>
            </ul>
        </li>
        <li class="menuitem">
          <a href="/ayuda/{{$alumno->claveUnica}}" data-toggle="modal" data-target="#ayuda">Ayuda</a>
        
        </li>
        <li class="menuitem" >
          <a href="/">Cerrar Sesión</a>
        </li>
      </ul><!--fin del primer ul--->
    </div>
    <!---FIN DIV MENU---> 

    <form method="POST" action="/GuardaDatosAsesor/{{$alumno->claveUnica}}" >
        @csrf
         <div class="tituloDatosAsesor">
          <p>Datos del asesor de la Empresa</p>
        </div><!--DIV TITULO DATOS ASESOR-->  
        <!--DIV que contiene los datos que se le piden al asesor-->

        <div class="Asesor" >
            <div class="row rowNomAsesor" ><!--DIV row1-->
              <div class="col-3 columCargoAs -sm" >
                <p>Nombre:</p>
              </div>
              <div class="col-9 inputNomAs -sm">
                <input type="text" class="form-control input-sm" name="nombreAsesor" required>
              </div>   
            </div><!--DIV row1-->
            <div class="row rowCargoAsesor1"><!--DIV row2-->
              <div class="col-3 columCargoAs -sm">
                <p>Cargo:</p>
              </div>
              <div class="col-9 inputCargoAs -sm" >
                <input type="text" class="form-control input-sm" name="cargo" required>
              </div>   
            </div><!--DIV row2-->
            <div class="row rowTelefonoAs"><!--DIV row3-->
              <div class="col-3 columCargoAs -sm">
                <p>Tel&eacutefono: </p>
              </div>
              <div class="col-9 inputCargoAs -sm">
                <input type="text" class="form-control input-sm" name="telefonoAsesor" required>
              </div>   
            </div><!--DIV row3-->
            <div class="row rowTipoAsesor"><!--DIV row4-->
              <div class="col-3 columCargoAs -sm">
                <p>Tipo Asesor: </p>
              </div>
              <div class="col-9 inputCargoAs -sm" >
                <select class="form-control  tipoAsselect" name="tipoAsesor" id="">
                  <option value="Externo">Externo</option>
                </select>
              </div>   
            </div><!--DIV row4-->
            <div class="row rowEmailAs"><!--DIV row5-->
              <div class="col-3 columCargoAs1 -sm">
                <p>Email: </p>
              </div>
              <div class="col-9 inputCargoAs1 -sm">
                <input type="text" class="form-control input-sm" name="emailAsesor" required>
              </div>   
            </div><!--DIV row5-->

            <div class="row rowEmailAs" style="top: 215px">
              <div class="col-4 colbotonesasesor1">
                 <input class="btn btn-warning " type="submit" value="Editar Datos">  
              </div>
              <div class="col-4 colbotonesasesor2">
                 <button data-toggle="modal" data-target="#guardaAsesor" class="btn btn-success">Guardar Datos</button> 
              </div>
              <div class="col-4 colbotonesasesor3">
                  <input class="btn btn-danger" type="submit" value="Cancelar" >  
              </div>
            </div><!--row botones----->              
        </div>  <!--DIV Asesor--> 

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
  </div>

  </body>
</html>