<?php

use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Empresa')->insert([
            'Nombre'=>"Cummins",
            'Direccion'=>"Eje 120",
            'Giro'=>"Motores",
            'Telefono'=>"8156492",
            'Registrada'=>"1",
        ]);
    }
}
