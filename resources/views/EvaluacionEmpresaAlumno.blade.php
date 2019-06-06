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
    <div style="height:170px;background-color: (198,217,241); padding: 0px"> <!--inicio del div contenedor de datos y de la foto-->
        <img src="/usuario.png" style="position: relative; left:100px; width: 15%">
      <div style="height: 200px; position: relative; left: 240px; bottom:140px;width: 66%; padding: 0px"> <!--DIV QUE CONTIENE LOS DATOS GENERALES DEL ALUMNO-->
        <div class="row" style="height: 28.5px; background-color: rgb(198,217,241); font-family: Tahoma;font-size: 12px">
          <div class="col-3" style="background-color: rgb(26,50,86); font-family: Tahoma;font-size: 15px; color: white; text-align: left"> Clave UASLP:</div>
          <div class="col-5">
              <label name="clave">{{$alumno->claveUnica}}</label>
          </div>
          <div class="col-4" style="background-color: rgb(26,50,86); font-family: Tahoma;font-size: 15px; color: white">Fecha: </div>
        </div>

        <div class="row">
          <div class="col-3" style="background-color: rgb(26,50,86); font-family: Tahoma;font-size: 15px; color: white">Clave Ingenier&iacutea:</div>
          <div class="col-5">
              <label>{{$alumno->claveIngenieria}}</label>
          </div>
          <div class="col-4"></div>
        </div>

        <div class="row">
          <div class="col-3" style="background-color: rgb(26,50,86); font-family: Tahoma;font-size: 15px; color: white"> Nombre:
          </div>
          <div class="col-5">
              <label name="nombre">{{$alumno->nombre}}</label>
          </div>
          <div class="col-4" style="background-color: (198,217,241); font-family: Tahoma;font-size: 15px; color: white"></div><!--aqui iba situaciÃ³n-->
        </div>

        <div class="row">
          <div class="col-3" style="background-color:rgb(26,50,86); font-family: Tahoma;font-size: 15px; color: white">Carrera: </div>
          <div class="col-5">
              <label name="carrera">{{$alumno->carrera}}</label>
          </div>
          <div class="col-4"></div>
        </div>

        <div class="row">
          <div class="col-3" style="background-color: rgb(26,50,86); font-family: Tahoma;font-size: 15px; color: white">Asesor: </div>
          <div class="col-5">
              <label>{{$tutor->nombre}}</label>
          </div>
          <div class="col-4" style="background-color: (198,217,241); font-family: Tahoma;font-size: 15px; color: white"></div><!--aqui iba condicion-->
        </div>

        <div class="row">
          <div class="col-3" style="background-color: rgb(26,50,86); font-family: Tahoma;font-size: 15px; color: white">Ciclo Escolar: </div>
          <div class="col-5">
              <label>{{$alumno->ciclo_escolar}}</label>
          </div>
          <div class="col-4"></div>
        </div>

        <div class="row">
          <div class="col-3" style="background-color: rgb(26,50,86); font-family: Tahoma;font-size: 15px; color: white; height: 30px">Semestre: </div>
          <div class="col-5">
              <label>{{$alumno->semestre}}</label>
          </div>
          <div class="col-4"></div>
        </div>
     </div> <!-- FIN DEL DIV QUE CONTIENE LOS DATOS GENERALES DEL ALUMNO-->
    </div>
  <!--fin del div contenedor de datos y de la foto-->
   <!---INICIO MENU--->
    <div class="menu" style="width: 78%">
      <ul>
        <li class="menuitem">
          <a href="#">Registro</a>
          <ul class="submenuRegistro">
              <li><a href="/llenarSolicitud/{{$alumno->claveUnica}}">Llenar Solicitud</a></li>   
          </ul>
        </li>
        <li class="menuitem">
          <a href="#">Reportes</a>
          <ul class="submenuRegistro">
              <li><a href="/subirReportesAlumno">Reportes</a></li>   
          </ul>
        </li>
      </ul>
    </div>

        <div class="titulo" style="width: 78%; position: relative; left: 122px">
        <p> </p>
      </div><!--DIV titulo-->
      <div class="tituloDatosAlumno " style="width: 78%; position: relative; left: 122px;background-color:rgb(26,50,86) /*color azul marino*/s">
        <p>CUESTIONARIO DE EVALUACI&OacuteN DEL ASESOR DE LA EMPRESA</p>
      </div>

      <!--div que contiene el cuestionario de evaluacion de alumno-empresa--->

        <form method="POST" action="/GuardaEvaluacion" style="width: 78%; position: relative; left: 122px">
           @csrf
        <div class="Alumno" style="height: 900px">
          <div class="row" style="width: 78%; margin-left:30px;  height: 30px"><!--DIV row1-->
            <div class="col-6 colum1 -sm" style="margin-bottom: 20px;text-align: left;background-color:rgb(26,50,86); height: 43px" >
              <p>Nombre de la empresa :</p>
            </div>
            <div class="col-6 -sm" style="top:15px; left:20px">
              <input type="text" class="form-control input-sm" required>
            </div>  
            <!---pregunta 1--->     
          </div><!--DIV row1-->
          <div class="row" style="width: 78%; margin-left:30px; text-align: left;height: 30px; padding: 0px"><!--DIV row4-->
            <div class="col-8 colum11 -sm" style="height: 44px; left:20px; text-align: left; background-color:rgb(26,50,86)" >
              <p>1.- Actividad principal que desarrolló el alumno:</p>
            </div>
            <div class="col-4 actividades -sm" style="top:30px">
              <textarea class="form-control" rows="1"></textarea>
            </div>
          </div><!--DIV row4-->  
               <!---pregunta 2---> 
          <div class="row" style="width: 78%; margin-left:30px; margin-bottom: 5px"><!--DIV row2-->
            <div class="col-8 colum2 -sm" style="text-align: left; background-color:rgb(26,50,86);width: 40px; margin-bottom: 5px; position: relative" >
              <p>2.- Relación de la actividad con la carrera:</p>
            </div>
            <div class="col-4 seleccionarEmpresa -sm" style="padding: 0px; left:40px"">
              <select class="form-control" name="" id="">
               <option value="">Selecciona una opci&oacuten</option>
               <option value="">1</option>
               <option value="">2</option>
               <option value="">3</option>
               <option value="">4</option>
              </select>
            </div>     
          </div><!--DIV row2-->    
          <!--pregunta 3--> 
          <div class="row" style="width: 78%; margin-left:30px; margin-bottom: 5px"><!--DIV row2-->
            <div class="col-8 colum2 -sm" style="text-align: left; background-color:rgb(26,50,86);width: 40px; margin-bottom: 5px; position: relative" >
              <p>3.- Interacción con el asesor de la empresa:</p>
            </div>
            <div class="col-4 seleccionarEmpresa -sm" style="padding: 0px; left:40px"">
              <select class="form-control" name="" id="">
               <option value="">Selecciona una opci&oacuten</option>
               <option value="">1</option>
               <option value="">2</option>
               <option value="">3</option>
               <option value="">4</option>
              </select>
            </div>     
          </div><!--DIV row2--> 
          <!--pregunta 4-->
           <div class="row" style="width: 78%; margin-left:30px; margin-bottom: 5px"><!--DIV row2-->
            <div class="col-8 colum2 -sm" style="text-align: left; background-color:rgb(26,50,86);width: 40px; margin-bottom: 5px; position: relative" >
              <p>4.- Asesoría por parte del asesor de la empresa:</p>
            </div>
            <div class="col-4 seleccionarEmpresa -sm" style="padding: 0px; left:40px"">
              <select class="form-control" name="" id="">
               <option value="">Selecciona una opci&oacuten</option>
               <option value="">1</option>
               <option value="">2</option>
               <option value="">3</option>
               <option value="">4</option>
              </select>
            </div>     
          </div><!--DIV row2--> 
          <!--pregunta 5-->  
           <div class="row" style="width: 78%; margin-left:30px; margin-bottom: 5px"><!--DIV row2-->
            <div class="col-8 colum2 -sm" style="text-align: left; background-color:rgb(26,50,86);width: 40px; margin-bottom: 5px; position: relative" >
              <p>5.- Asesoría por parte de la dirección de la empresa:</p>
            </div>
            <div class="col-4 seleccionarEmpresa -sm" style="padding: 0px; left:40px"">
              <select class="form-control" name="" id="">
               <option value="">Selecciona una opci&oacuten</option>
               <option value="">1</option>
               <option value="">2</option>
               <option value="">3</option>
               <option value="">4</option>
              </select>
            </div>     
          </div><!--DIV row2--> 
          <!--pregunta 6-->
           <div class="row" style="width: 78%; margin-left:30px; margin-bottom: 5px"><!--DIV row2-->
            <div class="col-8 colum2 -sm" style="text-align: left; background-color:rgb(26,50,86);width: 40px; margin-bottom: 5px; position: relative" >
              <p>6.- Asesoría por parte de otros ingeníeros en la empresa:</p>
            </div>
            <div class="col-4 seleccionarEmpresa -sm" style="padding: 0px; left:40px"">
              <select class="form-control" name="" id="">
               <option value="">Selecciona una opci&oacuten</option>
               <option value="">1</option>
               <option value="">2</option>
               <option value="">3</option>
               <option value="">4</option>
              </select>
            </div>     
          </div><!--DIV row2--> 
          <!--pregunta 7-->
           <div class="row" style="width: 78%; margin-left:30px; margin-bottom: 5px"><!--DIV row2-->
            <div class="col-8 colum2 -sm" style="text-align: left; background-color:rgb(26,50,86);width: 40px; margin-bottom: 5px; position: relative" >
              <p>7.- Asesoría por parte del personal técnico de la empresa:</p>
            </div>
            <div class="col-4 seleccionarEmpresa -sm" style="padding: 0px; left:40px"">
              <select class="form-control" name="" id="">
               <option value="">Selecciona una opci&oacuten</option>
               <option value="">1</option>
               <option value="">2</option>
               <option value="">3</option>
               <option value="">4</option>
              </select>
            </div>     
          </div><!--DIV row2--> 
          <!--pregunta 8-->
           <div class="row" style="width: 78%; margin-left:30px; margin-bottom: 5px"><!--DIV row2-->
            <div class="col-8 colum2 -sm" style="text-align: left; background-color:rgb(26,50,86);width: 40px; margin-bottom: 5px; position: relative" >
              <p>8.- Disponibilidad de materiales menores para la actividad:</p>
            </div>
            <div class="col-4 seleccionarEmpresa -sm" style="padding: 0px; left:40px"">
              <select class="form-control" name="" id="">
               <option value="">Selecciona una opci&oacuten</option>
               <option value="">1</option>
               <option value="">2</option>
               <option value="">3</option>
               <option value="">4</option>
              </select>
            </div>     
          </div><!--DIV row2--> 
          <!--pregunta 9-->
           <div class="row" style="width: 78%; margin-left:30px; margin-bottom: 5px"><!--DIV row2-->
            <div class="col-8 colum2 -sm" style="text-align: left; background-color:rgb(26,50,86);width: 40px; margin-bottom: 5px; position: relative" >
              <p>9.- Disponibilidad de recursos informáticos para la actividad:</p>
            </div>
            <div class="col-4 seleccionarEmpresa -sm" style="padding: 0px; left:40px"">
              <select class="form-control" name="" id="">
               <option value="">Selecciona una opci&oacuten</option>
               <option value="">1</option>
               <option value="">2</option>
               <option value="">3</option>
               <option value="">4</option>
              </select>
            </div>     
          </div><!--DIV row2--> 
          <!--pregunta 10-->
           <div class="row" style="width: 78%; margin-left:30px; margin-bottom: 5px"><!--DIV row2-->
            <div class="col-8 colum2 -sm" style="text-align: left; background-color:rgb(26,50,86);width: 40px; margin-bottom: 5px; position: relative" >
              <p>10.- Disponibilidad de equipo para la actividad:</p>
            </div>
            <div class="col-4 seleccionarEmpresa -sm" style="padding: 0px; left:40px"">
              <select class="form-control" name="" id="">
               <option value="">Selecciona una opci&oacuten</option>
               <option value="">1</option>
               <option value="">2</option>
               <option value="">3</option>
               <option value="">4</option>
              </select>
            </div>     
          </div><!--DIV row2--> 
          <!--pregunta 11-->
           <div class="row" style="width: 78%; margin-left:30px; margin-bottom: 5px"><!--DIV row2-->
            <div class="col-8 colum2 -sm" style="text-align: left; background-color:rgb(26,50,86);width: 40px; margin-bottom: 5px; position: relative" >
              <p>11.- Seguridad para el desarrollo de actividades:</p>
            </div>
            <div class="col-4 seleccionarEmpresa -sm" style="padding: 0px; left:40px"">
              <select class="form-control" name="" id="">
               <option value="">Selecciona una opci&oacuten</option>
               <option value="">1</option>
               <option value="">2</option>
               <option value="">3</option>
               <option value="">4</option>
              </select>
            </div>     
          </div><!--DIV row2--> 
          <!--pregunta 12-->      
           <div class="row" style="width: 78%; margin-left:30px; margin-bottom: 5px"><!--DIV row2-->
            <div class="col-8 colum2 -sm" style="text-align: left; background-color:rgb(26,50,86);width: 40px; margin-bottom: 5px; position: relative" >
              <p>12.- Actitud respetuosa por parte del personal de la empresa:</p>
            </div>
            <div class="col-4 seleccionarEmpresa -sm" style="padding: 0px; left:40px"">
              <select class="form-control" name="" id="">
               <option value="">Selecciona una opci&oacuten</option>
               <option value="">1</option>
               <option value="">2</option>
               <option value="">3</option>
               <option value="">4</option>
              </select>
            </div>     
          </div><!--DIV row2-->       
           <!--pregunta 13-->      
           <div class="row" style="width: 78%; margin-left:30px; margin-bottom: 5px"><!--DIV row2-->
            <div class="col-8 colum2 -sm" style="text-align: left; background-color:rgb(26,50,86);width: 40px; margin-bottom: 5px; position: relative" >
              <p>13.- ¿Recibiste remuneración ecónomica:?  (1: SI/ 2: NO)</p>
            </div>
            <div class="col-4 seleccionarEmpresa -sm" style="padding: 0px; left:40px"">
              <select class="form-control" name="" id="">
               <option value="">Selecciona una opci&oacuten</option>
               <option value="">0</option>
               <option value="">1</option>
              </select>
            </div>     
          </div><!--DIV row2-->  
           <!--pregunta 14-->      
           <div class="row" style="width: 78%; margin-left:30px; margin-bottom: 5px"><!--DIV row2-->
            <div class="col-8 colum2 -sm" style="text-align: left; background-color:rgb(26,50,86);width: 60px; margin-bottom: 5px; position: relative; height: 55px" >
              <p>14.- ¿Recomendarías esta empresa para que otros compañeros realicen una estancia profesional:? (1: SI/ 2: NO)</p>
            </div>
            <div class="col-4 seleccionarEmpresa -sm" style="padding: 0px; left:40px"">
              <select class="form-control" name="" id="">
               <option value="">Selecciona una opci&oacuten</option>
               <option value="">1</option>
               <option value="">2</option>
               <option value="">3</option>
               <option value="">4</option>
              </select>
            </div>     
          </div><!--DIV row2-->  
           <!--pregunta 15-->      
           <div class="row" style="width: 78%; margin-left:30px; margin-bottom: 5px"><!--DIV row2-->
            <div class="col-8 colum2 -sm" style="text-align: left; background-color:rgb(26,50,86);width: 40px; margin-bottom: 5px; position: relative; height: 55px" >
              <p>15.- Recomendaciones para mejorar la experiencia del prácticante en la empresa:</p>
            </div>
            <div class="col-4 actividades -sm" style="top:50px; left: 20px">
              <textarea class="form-control" rows="2"></textarea>
            </div>
          </div><!--DIV row2-->                    
        </div>  <!--fin div que contiene cuestionario Alumno-Empresa-->



   </div><!--container-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>