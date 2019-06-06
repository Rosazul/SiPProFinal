<?php

use Illuminate\Database\Seeder;

class TutorAcademicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TutorAcademico')->insert([
            'rpe'=>1,
            'Nombre'=>"Dr Hector Gerardo Perez Gonzalez",
            'password'=>"1",
            'correo'=>"rosaiselaolvera027@gmail.com",
        ]);
        DB::table('TutorAcademico')->insert([
            'rpe'=>2,
            'Nombre'=>"Dr David Arjona",
            'password'=>"2",
        ]);
        DB::table('TutorAcademico')->insert([
            'rpe'=>3,
            'Nombre'=>"Ing. José Navarro Cedillo",
            'password'=>"3",
        ]);
    }
}
