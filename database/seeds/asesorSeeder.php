<?php

use Illuminate\Database\Seeder;

class asesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asesor')->insert([
            'Nombre'=>"Jose Luis Perez Hernández",
            'Correo'=>"joseperez@cummins.com",
            'Telefono'=>"4445398761",
            'Puesto'=>"Gerente",
            'TipoAsesor'=>"Externo",
        ]);
    }
}
