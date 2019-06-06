<?php

use Illuminate\Database\Seeder;

class alumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alumno')->insert([
            'claveUnica'=>"201627",
            'Nombre'=>"Carmen Irene Lozano Ruiz",
            'claveIngenieria'=>"201111400695",
            'carrera'=>"Ingeniería en Informática",
            'cicloEscolar'=>"2018-2019/II",
            'semestre'=>"10",
            'condicion'=>"Irregular",
            'Situacion'=>"Inscrito",
            'idTutorAcademico'=>"1",
            'password'=>"1234",
        ]);
        DB::table('alumno')->insert([
            'claveUnica'=>"201628",
            'Nombre'=>"Mayra Karina Moreno Sabás",
            'claveIngenieria'=>"201111400699",
            'carrera'=>"Ingeniería Ambiental",
            'cicloEscolar'=>"2018-2019/II",
            'semestre'=>"10",
            'condicion'=>"Irregular",
            'Situacion'=>"Inscrito",
            'idTutorAcademico'=>"2",
            'password'=>"1234",
        ]);
        DB::table('alumno')->insert([
            'claveUnica'=>"201629",
            'Nombre'=>"Rosa Isela Martínez Olvera",
            'claveIngenieria'=>"201111400700",
            'carrera'=>"Ingeniería Civil",
            'cicloEscolar'=>"2018-2019/II",
            'semestre'=>"10",
            'condicion'=>"Irregular",
            'Situacion'=>"Inscrito",
            'idTutorAcademico'=>"3",
            'password'=>"1234",
        ]);
    }
}
