<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->truncate_tablas([
    		'usuarios',
    		'profesiones'
    	]);

        // $this->call(UsersTableSeeder::class);
        // el 'ProfesionSeeder::class' es lo mismo que "ProfesionSeeder", es el nombre de la clase
        $this->call(ProfesionSeeder::class);
        $this->call(UsuariosSeeder::class);
    }

    protected function truncate_tablas(array $tabla) {

    	// SET para que la clave foranea este desactivada
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
    	
    	foreach ($tabla as $tab) {
    		//Eliminamos datos de la tabla "profesiones"
    		DB::table($tab)->truncate();
    	}
    	
    	// SET para que la clave forane ese activa
    	DB::statement('SET FOREIGN_KEY_CHECKS = 1;');    	

    }
}
