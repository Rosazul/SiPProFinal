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
          <div class="col-5 colFecha"  > Fecha: {{$fecha}}
          </div>
        </div>
        <div class="row">
          <div class="col-3 colBienvenido"> Nombre:
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

 

    <div class="menuTutor">
      <ul><!--primer ul--->
        <li class="menuitem"  >
          <a href="#">Prácticas Profesionales
           </a>
          <ul class="submenuRegistroTutor" >
              <li style="">
                  <a href="/encargadoSolicitudesPendientes/{{$encargado->rpe}}">SOLICITUDES pendientes de Autorizar </a>
              </li>
          </ul>
            <ul class="submenuRegistroTutor" >
              <li>
                    <a href="/encargadoReportesPendientes/{{$encargado->rpe}}">REPORTES pendientes de Autorizar</a>
              </li>  
          </ul>
           <ul class="submenuRegistroTutor" > 
              <li>
                    <a href="/encargadoEmpresasPendientes/{{$encargado->rpe}}">EMPRESAS Pendientes de Autorizar</a>
              </li>  
            </ul>
         
        </li>


        <li class="menuitem" >
          <a href="#">Proceso de Prácticas Profesionales
          </a>
          <ul class="submenuRegistroTutor">
              <li><a href="#" >Diagrama de Proceso
                  </a>
              </li>   
          </ul>
       
        </li>
     

        <li class="menuitem">
          <a href="/ayuda/{{$encargado->rpe}}" data-toggle="modal" data-target="#ayuda">Ayuda</a>
        </li>
        <li class="menuitem">
          <a href="/">Cerrar Sesión</a>
        </li>
      </ul><!--fin del primer ul--->
    </div><!--fin div menu--->
    
         <!--DIV de los datos generales del alumno-->
    <div class="contenedorDatosAut"> <!--inicio del div contenedor de datos y de la foto-->
        <img src="/usuario.png">
      <div  class="DatosGenerales"> <!--DIV QUE CONTIENE LOS DATOS GENERALES DEL ALUMNO-->
        <div class="row fila1">
          <div class="col-3 columna1"> Clave UASLP:
          </div>
          <div class="col-5">
              <label name="clave">{{$alumno->claveUnica}}</label>
          </div>
          
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
     </div> <!-- FIN DEL DIV QUE CONTIENE LOS DATOS GENERALES DEL ALUMNO-->
                        
    </div>  <!--DIV Alumno-->
  
   <!------------------------------------------------------------------------------------>
   <!----------------------------------------------------------------------------------------------->
   <div class="EmpresaAut">
    <div class="tituloDatosEmpresaAut" >
        <p>Datos de la Empresa</p>
    </div>
    <!--DIV que contiene los datos que se le piden a la empresa-->
    <div class="EmpresaAutEncargado">
      <div class="row rowEmpresaNomAut"  ><!--DIV row1-->
        <div class="col-2 colum1 -sm">
          <p>Nombre : </p>
        </div>
        <div class="col-9 inputNombreEm2 -sm">
          <label class="label1">{{$emp->Nombre}}</label>
        </div>   
      </div><!--DIV row1-->
      <div class="row rowTipoPract2"><!--DIV row1-->
            <div class="col-2 colum1 -sm"  >
              <p>Dirección :</p>
            </div>
            <div class="col-8 -sm colTipoP" >
                <label>{{$emp->Direccion}}</label>
            </div>       
          </div><!--DIV row1-->
           <div class="row rowGiro1"><!--DIV row3-->
              <div class="col-2 columRamo2 -sm">
                <p>Giro de la Empresa:</p>
              </div>
            <div class="col-8 inputTel2 -sm">
                   <label>{{$emp->Giro}}</labe>
             </div>     
          </div><!--DIV row3-->
          
          <div class="row rowtelaut"><!--DIV row4-->
            <div class="col-2 colum111 -sm">
              <p>Télefono:</p>
            </div> 
            <div class="col-8 actividades -sm">
              <label class="label4">{{$emp->Telefono}}</label>
            </div>
        </div><!--DIV row4--> 
    </div>  <!--DIV Empresa--> 
    </div>  
 <!-------------------Fin Datos Empresa---------------------------------------->
    </div>

  <!--fin del div contenedor de datos y de la foto-->
<!--Comentarios-->
    <div class="contenedorComentarioAutEmp" >
      <p>Comentarios</p>
    </div>
    <form method="POST" action="/GuardaAcreditacionEmpresasEncargado/{{$encargado->rpe}}/{{$emp->idEmpresa}}">
        @csrf
        <div class="comentarioAutEmp">
          <div class="row rowComentario3" >
            <div class="col-3 columTel -sm" >
              <p>Fecha de autorización:</p>
            </div>
            <div class="col-9 inputTel -sm">
              <label name="fechaAutorizacion" id="fecha">{{$fechaAut}}</label>
            </div>     
          </div>
          <p class="parrafocomentarios"> Escriba aquí sus comentarios:</p>
          <input class="inputComentariosTutor" type="text" name="Comentarios" >
            <div class="Autoriza">
              <div class="form-group form-check">
                <input type="radio" class="form-check-input checkautoriza" name="radio" value="1">
                <label class="form-check-label checkautoriza">Autorizada</label>
              </div>
              <div class="form-group form-check">
                <input type="radio" class="form-check-input checkNoautoriza" name="radio" value="0">
                <label class="form-check-label checkNoautoriza">No Autorizada</label>
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