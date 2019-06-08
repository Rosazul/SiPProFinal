<?php

use Illuminate\Database\Seeder;

class EncargadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Encargado')->insert([
            'rpe'=>"4",
            'Nombre'=>"Dr Emilio",
            'password'=>"4",
            'cargo'=>"Secretario Académico",
            'carrera'=>"Ingeniería en Informática",
            'correo'=>"rosaiselaolvera027@gmail.com",
        ]);
        
        DB::table('Encargado')->insert([
            'rpe'=>"5",
            'Nombre'=>"Dr Emilio",
            'password'=>"5",
            'cargo'=>"Secretario Académico",
            'carrera'=>"Ingeniería Ambiental",
            'correo'=>"rosaiselaolvera027@gmail.com",
        ]);

        DB::table('Encargado')->insert([
            'rpe'=>"6",
            'Nombre'=>"Dr Emilio",
            'password'=>"6",
            'cargo'=>"Secretario Académico",
            'carrera'=>"Ingeniería Civil",
            'correo'=>"rosaiselaolvera027@gmail.com",
        ]);
    }
}
