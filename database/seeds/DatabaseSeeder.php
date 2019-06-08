<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(alumnoSeeder::class);
        $this->call(EmpresaSeeder::class);
        $this->call(EncargadoSeeder::class);
        $this->call(TutorAcademicoSeeder::class);
        //$this->call(PreguntasSeeder::class);
        $this->call(asesorSeeder::class);
        $this->call(registroPracticasSeeder::class);
    }
}
