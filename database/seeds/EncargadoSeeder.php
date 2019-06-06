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
            'correo'=>"rosaiselaolvera027@gmail.com",
        ]);
        
    }
}
