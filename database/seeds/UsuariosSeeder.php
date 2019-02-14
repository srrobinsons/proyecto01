<?php

use App\Usuarios;
use App\Profesiones;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$profesiones = DB::select('SELECT id FROM profesiones WHERE titulo = ?',  ['carpintero']);

        
        $profesion = DB::table('profesiones')
            ->select('id')
            ->where('titulo','=','carpintero')
            ->first();
            
        $profesionId = Profesiones::where('titulo', 'carpintero')->value('id');
        //dd($profesion);

        //
        //DB::table('usuarios')->insert([
        //Usuarios::create([            
        factory(Usuarios::class)->create([
        	'name' => 'Jose Perez',
        	'email'=> 'jose.perez@mail.com',
        	//'profesion_id' => $profesion->id,
            'profesion_id' => $profesionId,
        	// el bcrypt te encripta la pass para que no la veas en la base de datos
        	'password' => bcrypt('12345'),

        ]);

        $profesionId = Profesiones::where('titulo', 'mecanico')->value('id');

        //Usuarios::create([
        factory(Usuarios::class)->create([
            'name' => 'Juan Gomez',
            'email'=> 'juan.gomez@mail.com',
            'profesion_id' => $profesionId,
            'password' => bcrypt('12345'),
        ]);

        $profesionId = Profesiones::where('titulo', 'enfermero')->value('id');

        //Usuarios::create([
        factory(Usuarios::class)->create([
            'name' => 'Pedro Gonzales',
            'email'=> 'pedro.gonzales@mail.com',
            'profesion_id' => $profesionId,
            'password' => bcrypt('12345'),
        ]);


        factory(Usuarios::class)->create([
            'profesion_id' => $profesionId,
        ]);

        factory(Usuarios::class,6)->create([
        ]);
    }
}   