<?php

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
        //
        DB::table('usuarios')->insert([
        	'name' => 'Jose',
        	'email'=> 'jose@mail.com',
        	//'profesion_id' = >'?'
        	// el bcrypt te encripta la pass para que no la veas en la base de datos
        	'password' => bcrypt('12345'),

        ]);
    }
}
