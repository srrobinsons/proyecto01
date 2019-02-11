<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Profesiones;

class ProfesionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//en la tabla prefesiones insertamos registro
        Profesiones::create([
            'titulo' => 'carpintero',
        ]);

        Profesiones::create([
            'titulo' => 'mecanico',
        ]);

        profesiones::create([
            'titulo' => 'enfermero',
        ]);

        factory(Profesiones::class)->times(17)->create();
    }
}
