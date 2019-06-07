<?php

Route::get('/', function () {
    return view('principal');
});
/*******ENCARGADO**********/

Route::get('inicioSesionEncargado/', 'inicioSesionEncargadoController@inicioSesionEncargado');

Route::post('GuardaSesionEncargado', 'inicioSesionEncargadoController@GuardaSesionEncargado');
Route::get('/menuEncargado/{rpe}', 'menuEncargadoController@menuEncargado');

Route::get('/encargadoSolicitudesPendientes/{rpe}', 'EncargadoSolicitudesPendientesController@EncargadoSolicitudesPendientes');

Route::get('/autorizaEncargado/{rpe}/{clave}', 'AutorizacionesController@autorizacionesEncargado');

Route::post('/GuardaAcreditacionEncargado/{rpe}/{clave}', 'AutorizacionesController@GuardaAcreditacionEncargado');
Route::get('/ayuda/{rpe}', 'menuEncargadoController@menuEncargado');

/*********TUTOR ACADEMICO***********/

Route::get('inicioSesionTutorAcademico/', 'inicioSesionTutorAcademicoController@inicioSesionTutorAcademico');

Route::post('GuardaSesionTutorAcademico', 'inicioSesionTutorAcademicoController@GuardaSesionTutorAcademico');
Route::get('/menuTutorAcademico/{rpe}', 'menuTutorAcademicoController@menuTutorAcademico');

Route::get('/ayuda/{rpe}', 'menuTutorAcademicoController@menuTutorAcademico');

Route::get('/TutorAcademicoSolicitudesPendientes/{rpe}', 'TutorAcademicoSolicitudesPendientesController@TutorAcademicoSolicitudesPendientes');

//Route::get('/autorizaTutorAcademico/{rpe}/{clave}', 'AutorizacionTutorAcademicoController@TutorAcademicoAutorizaSolicitud');

Route::post('/GuardaAcreditacionTutor/{rpe}/{clave}', 'AutorizacionesController@GuardaAcreditacionTutor');

Route::get('/Elimina/{idRegistroPracticas}', 'AutorizacionTutorAcademicoController@Elimina');

/*******ALUMNO************/

Route::get('inicioSesionAlumno', 'inicioSesionAlumnoController@inicioSesionAlumno');
Route::post('GuardaSesionAlumno/', 'inicioSesionAlumnoController@GuardaSesionAlumno');

Route::get('/menuAlumno/{clave}', 'menuAlumnoController@menuAlumno');

Route::get('/datosPracticasProfesionales/{clave}', 'datosPracticasProfesionalesController@submenuDatosPracticas');
Route::post('/GuardaDatosPracticas/{clave}', 'datosPracticasProfesionalesController@GuardaDatosPracticas');
Route::get('/datosPracticasProfesionalesConDatos/{clave}', 'datosPracticasProfesionalesController@submenuDatosPracticasConDatos');



Route::get('/datosEmpresa/{clave}', 'datosEmpresaController@submenuDatosEmpresa');
Route::post('/GuardaDatosEmpresa/{clave}', 'datosEmpresaController@GuardaDatosEmpresa');
Route::get('/datosEmpresaConDatos/{clave}', 'datosEmpresaController@submenuDatosEmpresaConDatos');



Route::post('/GuardaDatosEmpresaModal/{clave}', 'datosEmpresaController@GuardaDatosEmpresaModal');
Route::post('/GuardaEmpresaDireccionModal/{clave}', 'datosEmpresaController@GuardaEmpresaDireccionModal');


Route::get('/datosAsesor/{clave}', 'datosAsesorController@submenuDatosAsesor');
Route::post('/GuardaDatosAsesor/{clave}', 'datosAsesorController@GuardaDatosAsesor');
Route::get('/datosAsesorConDatos/{clave}', 'datosAsesorController@submenuDatosAsesorConDatos');

Route::get('/ayuda/{clave}', 'menuAlumnoController@menuAlumno');

Route::get('/alumnoAutorizaciones/{clave}', 'AlumnoAutorizacionesController@AlumnoAutorizaciones');

Route::get('/alumnoAutorizacionesReportes/{clave}', 'AlumnoAutorizacionesController@AlumnoAutorizacionesReportes');

Route::get('/AutorizacionesEmpresa/{clave}', 'AlumnoAutorizacionesController@AlumnoAutorizacionesEmpresa');
/*********************************************************************************/
Route::get('/autorizaTutorAcademico/{rpe}/{clave}', 'AutorizacionesController@autorizaciones');

/********************REPORTES ALUMNO************************************/
Route::get('/reportes/{clave}', 'ReportesController@Reportes');
Route::get('/reportesAlumno/{rpe}/{clave}/{idReporte}', 'ReportesController@ReportesAlumno');
Route::post('/GuardaDatosReportes/{clave}', 'ReportesController@GuardaDatosReportes');

/********************REPORTES TUTOR ACADÉMICO************************************/
Route::get('/tutorAcademicoReportesPendientes/{rpe}', 'TutorAcademicoReportesPendientesController@TutorAcademicoReportesPendientes');
 
Route::post('/GuardaAcreditacionReportesTutor/{rpe}/{idReporte}', 'AutorizacionesReportesController@GuardaAcreditacionReportesTutor');

Route::get('/Elimina/{idReporte}', 'AutorizacionReportesController@Elimina');

/**********************+Autorizaciones TUTOR ACADEMICO************************/
Route::get('/autorizaReportesTutorAcademico/{rpe}/{clave}', 'AutorizacionesReportesController@AutorizacionesReportes');
/********************REPORTES ENCARGADO************************************/
Route::get('/encargadoReportesPendientes/{rpe}', 'EncargadoReportesPendientesController@EncargadoReportesPendientes');

Route::post('/GuardaAcreditacionReportesEncargado/{rpe}/{idReporte}','AutorizacionesReportesController@GuardaAcreditacionReportesEncargado');

Route::get('/Elimina/{idReporte}','AutorizacionesReportesController@Elimina');
/**********************+Autorizaciones ENCARGADO************************/
Route::get('/autorizaReportesEncargado/{rpe}/{clave}', 'AutorizacionesReportesController@AutorizacionesReportesEncargado');

Route::get('/download/{idReporte}', 'AutorizacionesReportesController@getDownload');

/**********************GUARDAR ARCHIVO************************/
Route::post('reportes', 'ReportesController@save');
/***************ENCARGADO AUTORIZA EMPRESAS *********************/

/********************EMPRESAS POR AUTORIZAR ENCARGADO***************/
Route::get('/encargadoEmpresasPendientes/{rpe}', 'EncargadoEmpresasPendientesController@EncargadoEmpresasPendientes');

Route::get('/autorizaEmpresasEncargado/{rpe}/{idEmpresa}', 'AutorizacionesEmpresasController@AutorizacionesEmpresasEncargado');

Route::post('/GuardaAcreditacionEmpresasEncargado/{rpe}/{idEmpresa}','AutorizacionesEmpresasController@GuardaAcreditacionEmpresasEncargado');
/********************EVALUACION DE ALUMNO A LA EMPRESA******************************************/
Route::get('/EvaluacionAlumnoEmpresa/{clave}', 'evaluacionAlumnoController@evaluacionAlumno');

/********************EVALUACION DE LA EMPRESA AL ALUMNO******************************************/
Route::get('/EvaluacionEmpresaAlumno/{clave}', 'evaluacionAlumnoController@evaluacionEmpresa');

Route::post('/GuardaEvaluacion/{clave}','evaluacionAlumnoController@GuardaEvaluacion');

  