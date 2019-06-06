<?php

use Illuminate\Database\Seeder;

class registroPracticasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('registroPracticas')->insert([
            'idEmpresa'=>"1",
            'idAsesor'=>"1",
            'horaEntrada'=>"08:00:00",
            'horaSalida'=>'12:00:00',
            'claveUnica'=>'201627',
            'fechaInicio'=>'2019/05/15',
            'fechaFin'=>'2019/08/15',
            'tipoPracticas'=>'Practicas Profesionales I',
            'actividad'=>'Desarrollo de Sistema',
            'guardaDatosPracticas'=>'1',
            'guardaDatosEmpresa'=>'1',
            'guardaDatosAsesor'=>'1',
            'statusSolicitud'=>'En Proceso',
        ]);
    }
}
