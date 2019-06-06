<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Index</title>
  <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
  <script>
      $(document).ready(function() {
    $("#datepicker").datepicker({
  dateFormat: 'dd/mm/yy',
    }).datepicker("setDate", new Date());
});
  </script>
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
             <label> {{$tutor->rpe}}</label>
          </div>
          <div class="col-5 colFecha" > Fecha: {{$fecha}}
          </div>
        </div>
        <div class="row">
          <div class="col-3 colBienvenido"> Nombre:
          </div>
          <div class="col-5">
            <label>  {{$tutor->Nombre}}</label>            
          </div>
          <div class="col-4 colNombreTutor" >
          </div><!--aqui iba situaciÃ³n-->
        </div>        
     </div> <!-- FIN DEL DIV QUE CONTIENE LOS DATOS GENERALES DEL ALUMNO-->
    </div>
  <!--fin del div contenedor de datos y de la foto-->


    <div class="menuTutor" style="height: 60px">
      <ul><!--primer ul--->
        <li class="menuitem"  style="height: 180px">
          <a href="#">Prácticas Profesionales
           </a>
          <ul class="submenuRegistroTutor" >
              <li style="">
                  <a href="/TutorAcademicoSolicitudesPendientes/{{$tutor->rpe}}">SOLICITUDES Pendientes de Autorizar</a>
              </li>
          </ul>
            <ul class="submenuRegistroTutor" >
              <li>
                    <a href="/tutorAcademicoReportesPendientes/{{$tutor->rpe}}">REPORTES Pendientes de Autorizar</a>
              </li>  
          </ul>      
        </li>

        <li class="menuitem" style="height: 180px">
          <a href="#">Proceso de Prácticas Profesionales</a>
          <ul class="submenuRegistro">
              <li><a href="#" >Diagrama de Proceso</a>
              </li>   
          </ul>
          <ul class="submenuRegistro" >
              <li><a href="#">Proceso</a>
              </li>   
          </ul>
          <ul class="submenuRegistro" >
              <li><a href="#">Preguntas Frecuentes</a>
              </li>   
          </ul>
        </li>
        <li class="menuitem" style="height: 180px">
          <a href="/ayuda/{{$tutor->rpe}}" data-toggle="modal" data-target="#ayuda">Ayuda</a>
        </li>
        <li class="menuitem" style="height: 180px">
          <a href="/">Cerrar Sesión</a>
        </li>
      </ul><!--fin del primer ul--->
    </div><!--fin div menu--->
    
         <!--DIV de los datos generales del alumno-->
    <div class="contenedorDatosAut"> <!--inicio del div contenedor de datos y de la foto-->
       
        <img src="/usuario.png" style="right: 450px">
      <div class="DatosGenerales"> <!--DIV QUE CONTIENE LOS DATOS GENERALES DEL ALUMNO-->
         <div class="titulodatosalumnorep" >
           <p>Datos del Alumno</p>
        </div>
        <div class="row fila1">
          <div class="col-3 columna1"> Clave Única:
          </div>
          <div class="col-5">
              <label name="clave">{{$alumno->claveUnica}}</label>
          </div>
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
     </div> <!-- FIN DEL DIV QUE CONTIENE LOS DATOS GENERALES DEL ALUMNO-->

    </div>  <!--DIV Alumno-->

    <div class="contenedorDatosRelevantes">
        <div class="titulodatosalumnorep1" >
           <p>Datos de las Prácticas</p>
        </div>
      <div class="row rowTipoPract1"><!--DIV row1-->
            <div class="col-2 colum1 -sm"  >
              <p>Tipo de Pr&aacutecticas :</p>
            </div>
            <div class="col-8 -sm colTipoP" >
                <label>{{$solicitud->tipoPracticas}}</label>
            </div>       
          </div><!--DIV row1---------->

        <div class="row rowPeriodo1" ><!--DIV row3-->
            <div class="col-3 colum1 -sm" >
             <p>Per&iacuteodo que abarcan las prácticas profesionales:</p>
            </div>
            <div class="col-2 fecha1 -sm">
              <p>Inicio :</p>
            </div>
            <div class="col-2 fechainput1aut -sm ">
              <label class="label3">{{$registroreporte->fechaInicio}}</label>
            </div>
            <div class="col-2 fecha2 -sm">
              <p>Fin :</p>
            </div>
            <div class="col-2 fechainput2aut -sm">
              <label class="label3">{{$registroreporte->fechaFin}}</label>
            </div>
        </div><!--DIV row3-->

    </div><!--FIN DATOS RELEVANTES Y DEL REPORTE DEL ALUMNO -->

    <!--DIV que contiene los datos que se le piden a la empresa-->
       <div class="titulodatosalumnorep2" >
           <p>Datos del Reporte</p>
        </div>
    <div class="EmpresaAutEncargado1">
    
      <div class="row rowEmpresaNomAut"  ><!--DIV row1-->
        <div class="col-3 colum1 -sm">
          <p>Nombre de la empresa: </p>
        </div>
        <div class="col-7 inputNombreEm1 -sm">
          <label class="label1">{{$emp->Nombre}}</label>
        </div>   
      </div><!--DIV row1-->

      <div class="row rowTipoPract2"><!--DIV row1------->
            <div class="col-3 colum1 -sm"  >
              <p>Número de reporte :</p>
            </div>
            <div class="col-9 -sm colTipoP" >
                <label>{{$registroreporte->numReporte}}</label>
            </div>       
      </div><!--DIV row1-->
         
          <div class="row rowPeriodoreporte" ><!--DIV row3-->
            <div class="col-3 colum1 -sm"  >
              <p>Per&iacuteodo que comprende el reporte:</p>
            </div>
            <div class="col-2 fecha1 -sm">
              <p>Inicio :</p>
            </div>
            <div class="col-2 fechainput1autrep -sm ">
              <label class="label3">{{$registroreporte->fechaInicio}}</label>
            </div>
            <div class="col-2 fecha22 -sm">
              <p>Fin :</p>
            </div>
            <div class="col-2 fechainput2aut -sm">
              <label class="label3">{{$registroreporte->fechaFin}}</label>
            </div>
          </div><!--DIV row3-->

          <div class="row rowActsrep"><!--DIV row4------------->
            <div class="col-3 colum111 -sm">
              <p>Actividades que realizó:</p>
            </div>
            <div class="col-9 actividades -sm">
              <label class="label4">{{$registroreporte->actividad}}</label>
            </div>
          </div><!--DIV row4--> 

      <div class="row rowVerArchivoRep"><!--DIV row4-->
            <div class="col-3 colum1111 -sm">
              <p>Descargar Archivo del Reporte:</p>
            </div>
            <div class="col-5 descargar -sm">
            <a href="/download/{{$registroreporte->idReporte}}" class="btn btn-large pull-right">{{$registroreporte->nombreArchivo}}</a>
            </div>
      </div><!--DIV row4--> 
    </div>  <!--DIV Empresa--> 
  </div>
 <!-------------------Fin Datos Empresa---------------------------------------->
    


  <!--fin del div contenedor de datos y de la foto-->
<!--Comentarios-->
    <div class="contenedorComentarioreporte1" >
      <p>Comentarios</p>
    </div>
    <form method="POST" action="/GuardaAcreditacionReportesTutor/{{$tutor->rpe}}/{{$registroreporte->idReporte}}">
        @csrf
      <div class="comentario3333">
        <div class="row rowComentario33" >
          <div class="col-3 columTel -sm" >
            <p>Fecha de autorización:</p>
          </div>
          <div class="col-9 inputTel -sm">
            <label type ="text" name="fechaAutorizacion" id="fecha" value="{{$fechaAut}}">{{$fechaAut}} </label>
          </div>     
        </div>
        <p class="parrafocomentariosreporte"> Escriba aquí sus comentarios:</p>
        <input class="inputComentariosTutor2" type="text" name="Comentarios" >
          <div class="Autoriza">
            <div class="form-group form-check">
              <input type="radio" class="form-check-input checkautoriza" name="radio" value="1">
              <label class="form-check-label checkautoriza">Reporte Autorizado</label>
            </div>
            <div class="form-group form-check">
              <input type="radio" class="form-check-input checkNoautoriza" name="radio" value="0">
              <label class="form-check-label checkNoautoriza">Reporte No Autorizado</label>
            </div>
            <input class="btn btn-success btnEnviarAut" type="submit" value="Enviar Datos">
            <input class="btn btn-danger btnEnviarAut1" type="submit" value="Cancelar">
          </div>    
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
</body>
</html>