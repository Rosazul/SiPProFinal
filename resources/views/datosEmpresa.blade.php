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
  <div class="menu" style="height: 55px">
     
      <ul><!--primer ul--->
        <li class="menuitem" >
          <a href="#" >Registrar Solicitud</a>
           <ul class="submenu">
             <li>
               @if(!isset($solicitud))
                  <a href="/datosPracticasProfesionales/{{$alumno->claveUnica}}">Llenar Datos Prácticas Profesionales
                  </a>
                @endif 
                @if(isset($solicitud)&&($solicitud->guardaDatosPracticas == '1'))
                  <a href="/datosPracticasProfesionalesConDatos/{{$alumno->claveUnica}}">Datos Prácticas Profesionales
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

      <li class="menuitem">
          <a href="/ayuda/{{$alumno->claveUnica}}" data-toggle="modal" data-target="#ayuda">Ayuda</a>
      </li>
      
      <li class="menuitem" >
        <a href="/">Cerrar Sesión</a>
      </li>
    </ul><!--fin del primer ul--->
  </div>
    <!---FIN DIV MENU---> 

    <!-----------------MODALES------------------------------------------------>
      <form action="/GuardaDatosEmpresa/{{$alumno->claveUnica}}" method="POST" class = "formGuardaEmpresa" >
      @csrf
        <div class="modal fade" id="guardaEmpresa" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Encabezado</h5>
                <button class="close"><span>&times;</span></button>
              </div>

              <div class="modal-body modalDatosPracticas">
                <div class="modal-header">
                  <h1>Datos Empresa</h1>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                  <p>Los datos de la Empresa fueron guardados correctamente, por favor continue con los Datos del Asesor</p>
                </div>  
              </div>
              <input type="hidden" value="" name="nombreEmpresachido" id="nombreEmpresachido"> 
              <input type="hidden" value="" name="direccionchida" id="direccionchida">
              <input type="hidden" value="" name="girochido" id="girochido">
              <input type="hidden" value="" name="telefonochido" id="telefonochido">
              <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button data-toggle="modal" data-target="#guardaEmpresa" class="btn btn-success">Aceptar</button>
              </div>
            </div>
          </div>
        </div>
    </form>

      <div class="modal fade" id="proponerEmpresa" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
          <div class="modal-dialog modalDatosPracticas">
            <div class="modal-content">
              <div class="modal-header">
                    <h1>Alta Empresa</h1>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                <form method="POST" action="/GuardaDatosEmpresaModal/{{$alumno->claveUnica}}">
                  @csrf
                  <label>Nombre: </label>
                  <input type="text" placeholder="Nombre" name="nombreEmpresa"><br><br>
                  <br>                
                  <label>Direcci&oacuten:</label>
                  <input type="text" placeholder="Direccion" name="direccionE"><br><br>
                  <label>Telefono:</label>
                  <input type="text" name="telefonoE">
                  <label>Giro:</label>
                  <input type="text" name="giroE"><br>
                  
                  <div class="modal-footer">
                      <a href="#" data-dismiss="modal" class="btn btn-danger">Cancelar</a>
                      <button data-toggle="modal" data-target="#guardaEmpresa" class="btn btn-primary">Aceptar</button>
                  </div>
                </form>
              </div>  
          </div>
        </div>
      </div><!--DIV MODAL-->

      <div class="modal fade" id="proponerEmpresaDireccion">
          <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                    <h1>Alta Empresa y Direcci&oacuten</h1>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               </div>
               <div class="modal-body">
              <form method="POST" action="/GuardaEmpresaDireccionModal/{{$alumno->claveUnica}}">
                @csrf
                <label>Empresa: </label>
                <select class="form-control" name="idEmpresa">
                  @foreach($empresa as $emp)
                    <option value="{{$emp->idEmpresa}}">{{$emp->Nombre}}</option>
                  @endforeach 
                </select>
                <br>                
                <label>Direcci&oacuten:</label>
                <input type="text" placeholder="Direccion" name="direccion"><br><br>
                <label>Telefono:</label>
                <input type="text" placeholder="Telefono" name="telefono">
                <label>Giro:</label>
                <input type="text" placeholder="Giro" name="giro"><br>
                <div class="modal-footer">
                    <a href="#" data-dismiss="modal" class="btn btn-danger">Cancelar</a>
                    <button data-toggle="modal" data-target="#guardaEmpresa" class="btn btn-primary">Guardar</button>
                </div>
              </form>
            </div>  
          </div>
        </div>
      </div><!--DIV MODAL--> 
  
    <!----------------------------FIN DE LOS MODALES---------------------------------------->
    <form  class = "formGuardaEmpresa" method="POST" action="/GuardaDatosEmpresa/{{$alumno->claveUnica}}">
        @csrf
        <div class="tituloDatosEmpresa">
          <p>Datos de la Empresa</p>
        </div>
          <!--DIV que contiene los datos que se le piden a la empresa-->
        <div class="Empresa">
          <div class="row rowNombreEmpresa" style="right: 147px"><!--DIV row1-->
            <div class="col-3 colum111 -sm">
              <p>Nombre de la empresa: </p>
            </div>
            <div class="col-9 inputNombreEm -sm">
              <select class="form-control" name="idEmpresa" id="idEmpresa">
                <option value="0">Seleccione una opci&oacuten</option>
                @foreach($empresa as $emp)
                @if($emp->registrada == '1')
                   <option value="{{$emp->idEmpresa}}">{{$emp->Nombre}}</option>
                @endif
                @endforeach
                {{-- <option>cummins</option> --}}
              </select> 
            </div>   
          </div><!--DIV row1-->
          <div class="row catalogoDirEmp"><!--DIV row2-->
            <div class="col-3 colum2 -sm">
              <p>Direcci&oacuten:</p>
            </div>
            <div class="col-9 seleccionarEmpresa -sm">
              <select class="form-control" name="direccion" id="idEmpresa2" disabled>
                <option value="0"></option>
                @foreach($empresa as $emp)
                  <option  value="{{$emp->idEmpresa}}">{{$emp->Direccion}}</option>
                @endforeach
              </select>
            </div>     
          </div><!--DIV row2-->
          
          <div class="row rowGiro"><!--DIV row3-->
            <div class="col-3 columRamo -sm">
              <p>Giro de la Empresa:</p>
            </div>
            <div class="col-9 inputTel2 -sm">
              <select class="form-control" name="giro" id="idEmpresa3" disabled>
                <option></option>
                @foreach($empresa as $emp)
                   <option value="{{$emp->idEmpresa}}">{{$emp->Giro}}</option>
                  
                 @endforeach
              </select>
             </div>     
          </div><!--DIV row3-->

          <div class="row rowTelefono"><!--DIV row4-->
            <div class="col-3 columTel -sm">
              <p>Tel&eacutefono:</p>
            </div>
            <div class="col-9 inputTel -sm">
              <select class="form-control" name="telefonoEmpresa" id="idEmpresa4" disabled>
                <option></option>
                @foreach($empresa as $emp)
                   <option value="{{$emp->idEmpresa}}">{{$emp->Telefono}}</option>

                 @endforeach
              </select>
            </div>     
          </div><!--DIV row4-->

      <!---BOTONES---->
          <div class="row rowbotonesempresa">        
                <div class="col-4 colbotemp1">
                     <input class="btn btn-warning " type="submit" value="Editar Datos" > 
                </div> 
                <div class="col-4 colbotemp2">     
                        <input type="button" data-toggle="modal" data-target="#guardaEmpresa" class="btn btn-success " value="Guardar Datos">
                </div> 
                <div class="col-4 colbotemp3">
                      <input class="btn btn-danger" type="submit" value="Cancelar" >  
                </div>    
          </div> <!---row botones EDITAR GUARDAR CANCELar----> 

          <div class="row rowProponerbotones"><!--DIV row5-->
            <div class="col-6 colProponer1" >
            <input type="button" data-toggle="modal" data-target="#proponerEmpresa" class="btn btn-primary bGuardar1" value="Proponer Empresa">
            </div>
            <div class="col-6 colProponer2" >
            <input type="button" data-toggle="modal" data-target="#proponerEmpresaDireccion" class="btn btn-primary bGuardar1" value="Proponer Empresa y Direccion">
            </div>
          </div><!--DIV row5-->         
  </div>  <!--DIV Empresa-->
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

      <script>
        var op1 = document.getElementById("idEmpresa");
        var op2 = document.getElementById("idEmpresa2");
        var op3 = document.getElementById("idEmpresa3");
        var op4 = document.getElementById("idEmpresa4");
//        var op5 = document.getElementById("item3");
        var op5 = document.getElementById("nombreEmpresachido");
        var op6 = document.getElementById("direccionchida");
        var op7 = document.getElementById("girochido");
        var op8 = document.getElementById("telefonochido");

        op1.addEventListener("change", function() {
           //alert(op1.value);
           op2.value=op1.value;
           op3.value=op1.value;
           op4.value=op1.value;
           op2.disabled=true;
           op3.disabled=true;
           op4.disabled=true;
  //         op5.disabled=true;
           op5.value=op1.value;
           op6.value=op1.value;
           op7.value=op1.value;
           op8.value=op1.value;

        });
      </script>
</body>
</html>