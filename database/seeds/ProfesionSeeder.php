<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfesionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//

    	//en la tabla prefesiones insertamos registro    	
        DB::table('profesiones')->insert([
        	'titulo' => 'carpintero',
        ]);

        DB::table('profesiones')->insert([
        	'titulo' => 'mecanico',
        ]);        

        DB::table('profesiones')->insert([
        	'titulo' => 'Enfermero',
        ]);


    }
}
