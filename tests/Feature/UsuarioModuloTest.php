<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Usuarios;

class UsuarioModuloTest extends TestCase
{
    /**
     * @test */
    function usuarios_pagina()
    {
        $this->get('/usuarios')
             ->assertStatus(200)
             ->assertSee('Usuarios')
             ->assertSee('Jose')
             ->assertSee('Juan');
    }

    /**
     * @test */
    function usuarios_pagina_sin_usus()
    {
        $this->get('/usuarios?empty')
             ->assertStatus(200)
             ->assertSee('No hay usuarios registrados');
    }    

    /**
     * @test */
    function usuarios_abc()
    {
        $this->get('/usuarios/1')
             ->assertStatus(200)
             ->assertSee('Detalle de usuario:');
    }

    function hay_error_404() {
        $this->get('/usuarios/999')
             ->assertStatus(404)
             ->assertSee('Página no encontrada');
    }

    /**
     * @test */
    function usuarios_nuevo()
    {
        $this->get('/usuarios/nuevo')
             ->assertStatus(200)
             ->assertSee('Crear nuevo usuario');
    }


    /**
     * @test */
    function se_creo_nuevo_usu()

    {
        $this->withoutExceptionHandling();

        $this->post('/usuarios/crear',[
            'nombre' => 'Pablo',
            'mail'=> 'pablo@mail.com',
            //'profesion_id' => 1,            
            'clave1' => '12345',
            'clave2' => '12345' ])
        //;
             ->assertRedirect('usuarios');

        $this->assertDatabaseHas('usuarios',[
        //$this->assertCredentials([
            'name' => 'Pablo',
            'email'=> 'pablo@mail.com',
            //'profesion_id' => 1,
            //'password' => '12345'
            ]);
    }


    /**
     * @test */
    function nombre_es_requerido()

    {
        //$this->withoutExceptionHandling();

        $this->from('usuarios/nuevo')
             ->post('/usuarios/crear', [
                'nombre' => '',
                'mail'   => 'ejemplo@mail.com',
                'clave1' => '123456'
             ])
             ->assertRedirect('usuarios/nuevo')  //redirecciona a la misma 
             ->assertSessionHasErrors(['nombre' => 'El campo nombre es obligatorio']); //mostrar los errores en sesion

        $this->assertDatabaseMissing('usuarios', [
            'email' => 'ejemplo@mail.com',
        ]);
    }
}