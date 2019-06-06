<?php

use Illuminate\Database\Seeder;

class PreguntasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('preguntasalumno')->insert([
        	'p1'=>"1. Actividad principal que desarrollo el alumno",
            'p2'=>"2. Relación de la actividad con la carrera",
            'p3'=>"3. Interacción con el Asesor de la Empresa",
            'p4'=>"4. Asesoría por parte del Asesor de la Empresa",
            'p5'=>"5. Asesoría por parte de la dirección de la Empresa",
            'p6'=>"6. Asesoría por parte de otros ingenieros de la Empresa",
            'p7'=>"7. Asesoría por parte del personal técnico de la Empresa",
            'p8'=>"8. Disponibilidad de materiales básicos para la actividad",
            'p9'=>"9. Disponibilidad de herramienta informáticas para la actividad",
            'p10'=>"10. Disponibilidad de equipo para la actividad",
            'p11'=>"11. Seguridad para el desarrollo de actividades",
            'p12'=>"12. Actividad respetuosa por parte del personal de la Empresa",
            'p13'=>"13. ¿Recibiste renumeración económica? 1: Si, 2: No",
            'p14'=>"14. ¿Recomendarías esta Empresa a otros compañeros, para que realicen su estancia profesional? 1: Si, 2: No",
            'p15'=>"15. ¿Recomendaciones para el mejoramiento de la experiencia del practicante en la Empresa?",
            'p16'=>"16. Comentarios Adicionales",
        ]);
    }
}
