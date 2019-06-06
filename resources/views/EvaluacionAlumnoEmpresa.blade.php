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
          <div class="col-4">
              <label name="clave">{{$alumno->claveUnica}}</label>
          </div>
          <div class="col-5 columna1" style="background-color: rgb(26,50,86)">Fecha:{{$fecha}} </div>
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
                  <a href="/datosPracticasProfesionales/{{$alumno->claveUnica}}">Llenar Datos Practicas Profesionales
                  </a>
                @endif 
                @if(isset($solicitud)&&($solicitud->guardaDatosPracticas == '1'))
                  <a href="/datosPracticasProfesionalesConDatos/{{$alumno->claveUnica}}">Datos Practicas Profesionales
                  </a>
                @endif
               </li>
                <li>
                @if(!isset($solicitud)&&($solicitud->guardaDatosEmpresa == '0'))
                  <a href="/datosEmpresa/{{$alumno->claveUnica}}">Llenar Datos de la Empresa
                  </a>
                @endif 
                @if(isset($solicitud)&&($solicitud->guardaDatosEmpresa == '1'))
                  <a href="/datosEmpresaConDatos/{{$alumno->claveUnica}}">Datos de la Empresa
                  </a>
                @endif
                </li>
                <li>
                @if(!isset($solicitud)&&($solicitud->guardaDatosAsesor == '0'))
                  <a href="/datosAsesor/{{$alumno->claveUnica}}">Llenar Datos del Asesor
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
                <a href="/alumnoAutorizaciones/{{$alumno->claveUnica}}" >Autorizaciones</a>
            </li>            
          @endif

        @if(isset($reportes)&&isset($solicitud))
          @if(($reportes->statusReporte == "Aprobado") && ($reportes->numReporte == 'REPORTE FINAL'))
           <li class="menuitem">
            <a href="/EvaluacionAlumnoEmpresa/{{$alumno->claveUnica}}">Evaluacion</a>
          </li>
          @endif
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

      <div class="tituloDatosAlumnoEvaluacion ">
        <p>CUESTIONARIO DE EVALUACI&OacuteN DEL ALUMNO</p>
      </div>
 
      <!--div que contiene el cuestionario de evaluacion de alumno-empresa--->

        <form method="POST" action="/GuardaEvaluacion/{{$alumno->claveUnica}}" class="formEvaluacion">
           @csrf
        <div class="AlumnoEval">
          <div class="row rowPregunta1"><!--DIV row1-->
            <div class="col-6 colump1 -sm">
              <p>Nombre de la empresa :</p>
            </div>
            <div class="col-6 colump11 -sm" >
              <label>{{$empresa->Nombre}}</label>
            </div>  
            <!---pregunta 1---> 
            <!--DIV para instrucciones-->
          <div>
            <p class="parrafocalificar">INSTRUCCIONES: Lea detenidamente, para las preguntas del 2 al 12, elija una opción de acuerdo a la siguiente escala :</p>
            <p class="parrafocalificar2">[1:Ninguna  2:Poca 3:Regular 4:Mucha] </p>
          </div>    
          </div><!--DIV row1-->
          <div class="row rowp2"><!--DIV row4-->
            <div class="col-8 colump111 -sm" style="" >
              @foreach($preguntas as $preg)
              <p name="preg1">{{$preg->p1}}</p>
              @endforeach
            </div>
            <div class="col-4 actividadesEval -sm" style="padding: 0px">
              <label>{{$solicitud->actividad}}</label>
            </div>
          </div><!--DIV row4-->  
               <!---pregunta 2---> 
          <div class="row rowpregunta2"><!--DIV row2-->
            <div class="col-8 colum2p -sm" style="" >
              @foreach($preguntas as $preg)
              <p name="preg2">{{$preg->p2}}</p>
              @endforeach
            </div>
            <div class="col-4 seleccionarEval -sm" style="padding: 0px; left:60px">
              <select class="form-control" name="relacionActividad" id="">
               <option value="">Selecciona una opci&oacuten</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
              </select>
            </div>     
          </div><!--DIV row2-->    
          <!--pregunta 3--> 
          <div class="row rowpregunta3"><!--DIV row2-->
            <div class="col-8 colum23 -sm"  >
              @foreach($preguntas as $preg)
              <p name="preg3">{{$preg->p3}}</p>
              @endforeach
            </div>
            <div class="col-4 seleccionarEmpresa -sm" style="padding: 0px; left:40px">
              <select class="form-control" name="interaccionAsesor" id="">
               <option value="">Selecciona una opci&oacuten</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
              </select>
            </div>     
          </div><!--DIV row2--> 
          <!--pregunta 4-->
           <div class="row rowpregunta4" style=""><!--DIV row2-->
            <div class="col-8 colump4 -sm" style="" >
              @foreach($preguntas as $preg)
              <p name="preg4">{{$preg->p4}}</p>
              @endforeach
            </div>
            <div class="col-4 seleccionarEmpresa -sm" style="padding: 0px; left:40px">
              <select class="form-control" name="asesoriaAsesor" id="">
               <option value="">Selecciona una opci&oacuten</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
              </select>
            </div>     
          </div><!--DIV row2--> 
          <!--pregunta 5-->  
           <div class="row r5" style=""><!--DIV row2-->
            <div class="col-8 colr5 -sm" style="" >
              @foreach($preguntas as $preg)
              <p name="preg5">{{$preg->p5}}</p>
              @endforeach
            </div>
            <div class="col-4 seleccionarEmpresa -sm" style="padding: 0px; left:40px">
              <select class="form-control" name="asesoriaDireccion" id="">
               <option value="">Selecciona una opci&oacuten</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
              </select>
            </div>     
          </div><!--DIV row2--> 
          <!--pregunta 6-->
           <div class="row r6" style=""><!--DIV row2-->
            <div class="col-8 colr6 -sm" style="" >
              @foreach($preguntas as $preg)
              <p name="preg6">{{$preg->p6}}</p>
              @endforeach
            </div>
            <div class="col-4 seleccionarEmpresa -sm" style="padding: 0px; left:40px">
              <select class="form-control" name="asesoriaIngenieros" id="">
               <option value="">Selecciona una opci&oacuten</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
              </select>
            </div>     
          </div><!--DIV row2--> 
          <!--pregunta 7-->
           <div class="row r7" style=""><!--DIV row2-->
            <div class="col-8 colr7 -sm" style="" >
              @foreach($preguntas as $preg)
              <p name="preg7">{{$preg->p7}}</p>
              @endforeach
            </div>
            <div class="col-4 seleccionarEmpresa -sm" style="padding: 0px; left:40px">
              <select class="form-control" name="asesoriaPersonalT" id="">
               <option value="">Selecciona una opci&oacuten</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
              </select>
            </div>     
          </div><!--DIV row2--> 
          <!--pregunta 8-->
           <div class="row r8" style=""><!--DIV row2-->
            <div class="col-8 colr8 -sm" style="" >
              @foreach($preguntas as $preg)
              <p name="preg8">{{$preg->p8}}</p>
              @endforeach
            </div>
            <div class="col-4 seleccionarEmpresa -sm" style="padding: 0px; left:40px">
              <select class="form-control" name="dispMateriales" id="">
               <option value="">Selecciona una opci&oacuten</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
              </select>
            </div>     
          </div><!--DIV row2--> 
          <!--pregunta 9-->
           <div class="row r9" style=""><!--DIV row2-->
            <div class="col-8 colr9 -sm" style="" >
              @foreach($preguntas as $preg)
              <p name="preg9">{{$preg->p9}}</p>
              @endforeach
            </div>
            <div class="col-4 seleccionarEmpresa -sm" style="padding: 0px; left:40px">
              <select class="form-control" name="dispRecursos" id="">
               <option value="">Selecciona una opci&oacuten</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
              </select>
            </div>     
          </div><!--DIV row2--> 
          <!--pregunta 10-->
           <div class="row r10" style=""><!--DIV row2-->
            <div class="col-8 colr10 -sm" style="" >
              @foreach($preguntas as $preg)
              <p name="preg10">{{$preg->p10}}</p>
              @endforeach
            </div>
            <div class="col-4 seleccionarEmpresa -sm" style="padding: 0px; left:40px">
              <select class="form-control" name="dispEquipo" id="">
               <option value="">Selecciona una opci&oacuten</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
              </select>
            </div>     
          </div><!--DIV row2-->
          <!--pregunta 11--> 
           <div class="row r11" style=""><!--DIV row2-->
            <div class="col-8 colr11 -sm" style="" >
              @foreach($preguntas as $preg)
              <p name="preg10">{{$preg->p11}}</p>
              @endforeach
            </div>
            <div class="col-4 seleccionarEmpresa -sm" style="padding: 0px; left:40px">
              <select class="form-control" name="segDesarrollo" id="">
               <option value="">Selecciona una opci&oacuten</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
              </select>
            </div>     
          </div><!--DIV row2-->
          <!--pregunta 12-->
           <div class="row r12" style=""><!--DIV row2-->
            <div class="col-8 colr12 -sm" style="" >
              @foreach($preguntas as $preg)
              <p name="preg10">{{$preg->p12}}</p>
              @endforeach
            </div>
            <div class="col-4 seleccionarEmpresa -sm" style="padding: 0px; left:40px">
              <select class="form-control" name="actPersonal" id="">
               <option value="">Selecciona una opci&oacuten</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
              </select>
            </div>     
          </div><!--DIV row2-->
          <!--Intrucciones preguntas 13 y 14-->
          <div>
            <p class="parrafocalificar3">Responder las preguntas 13 y 14 con la siguiente escala:</p>
            <p class="parrafocalificar3">[ 0:NO ó 1:SI ] </p>
          </div>   
          <!--pregunta 13-->
            <div class="row r13" style=""><!--DIV row2-->
            <div class="col-8 colr13 -sm" style="" >
              @foreach($preguntas as $preg)
              <p name="preg10">{{$preg->p13}}</p>
              @endforeach
            </div>
            <div class="col-4 seleccionarEmpresa -sm" style="padding: 0px; left:40px">
              <select class="form-control" name="economica" id="">
               <option value="">Selecciona una opci&oacuten</option>
               <option value="0">0</option>
               <option value="1">1</option>
              </select>
            </div>     
          </div><!--DIV row2-->
          <!--pregunta 14-->
            <div class="row r14" style=""><!--DIV row2-->
            <div class="col-8 colr14 -sm" style="" >
              @foreach($preguntas as $preg)
              <p name="preg10">{{$preg->p14}}</p>
              @endforeach
            </div>
            <div class="col-4 seleccionarEmpresa -sm" style="padding: 0px; left:40px">
              <select class="form-control" name="recoEmpresa" id="">
               <option value="">Selecciona una opci&oacuten</option>
               <option value="0">0</option>
               <option value="1">1</option>
              </select>
            </div>     
          </div><!--DIV row2-->
          <!--Instrucciones preguntas 15 y 16-->
          <div>
            <p class="parrafocalificar4">Responda abiertamente para las preguntas 15 y 16 </p>
          </div>  
          <!--pregunta 15-->
           <div class="row r15" style=""><!--DIV row2-->
            <div class="col-8 colr15 -sm" style="" >
              @foreach($preguntas as $preg)
              <p name="preg10">{{$preg->p15}}</p>
              @endforeach
            </div>
            <div class="col-4 actividadesEval2 -sm" style="padding: 0px">
              <textarea class="form-control" rows="3" name="recoExperiencia"></textarea>
            </div>
          </div><!--DIV row2-->
          <!--pregunta 16-->
                   <div class="row r16" style=""><!--DIV row2-->
            <div class="col-8 colr16 -sm" style="" >
              @foreach($preguntas as $preg)
              <p name="preg10">{{$preg->p16}}</p>
              @endforeach
            </div>
            <div class="col-4 actividadesEval2 -sm" style="padding: 0px">
              <textarea class="form-control" rows="3" name="comentariosAd"></textarea>
            </div>
          </div><!--DIV row2-->
              
          
          <input class="btn btn-success btnEnviarEval" type="submit" value="Enviar Datos">
                      
        </div>  <!--fin div que contiene cuestionario Alumno-Empresa-->


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