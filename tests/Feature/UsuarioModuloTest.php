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


    /**
     * @test */
    function mail_es_requerido()

    {
        //$this->withoutExceptionHandling();

        $this->from('usuarios/nuevo')
             ->post('/usuarios/crear', [
                'nombre' => 'Monica',
                'mail'   => '',
                'clave1' => '123456'
             ])
             ->assertRedirect('usuarios/nuevo')  //redirecciona a la misma 
             ->assertSessionHasErrors(['mail' => 'El campo email es obligatorio']); // mostrar los errores en sesion

        //para afirmar que no existe Monica en tabla usuarios
        $this->assertDatabaseMissing('usuarios', [
            'name' => 'Monica',
        ]);
    }

    /**
     * @test */
    function mail_debe_ser_valido()

    {
        //$this->withoutExceptionHandling();

        $this->from('usuarios/nuevo')
             ->post('/usuarios/crear', [
                'nombre' => 'Norberto',
                'mail'   => 'mail-no-valido',
                'clave1' => '123456'
             ])
             ->assertRedirect('usuarios/nuevo')  //redirecciona a la misma 
             ->assertSessionHasErrors(['mail']); // mostrar los errores en sesion

        //para afirmar que no existe Norberto en tabla usuarios
        $this->assertDatabaseMissing('usuarios', [
            'name' => 'Norberto',
        ]);
    }

    /**
     * @test */
    function mail_debe_ser_unico()

    {
        factory(Usuarios::class)->create([
            'name' => 'Juan P',
            'email' => 'juan.perez@mail.com',
            'password' => '123456'
        ]);

        $this->from('usuarios/nuevo')
             ->post('/usuarios/crear', [
                'nombre' => 'Juan Perez',
                'mail'   => 'juan.perez@mail.com',
                'clave1' => '123456'
             ])
             ->assertRedirect('usuarios/nuevo')  //redirecciona a la misma 
             ->assertSessionHasErrors(['mail']); // mostrar los errores en sesion

        //para afirmar que no existe Norberto en tabla usuarios
        $this->assertDatabaseMissing('usuarios', [
            'name' => 'Juan Perez',
        ]);
    }

    /**
     * @test */
    function password_es_requerido()

    {
        //$this->withoutExceptionHandling();

        $this->from('usuarios/nuevo')
             ->post('/usuarios/crear', [
                'nombre' => 'Raul',
                'mail'   => 'raul@mail.com',
                'clave1' => ''
             ])
             ->assertRedirect('usuarios/nuevo')  //redirecciona a la misma 
             ->assertSessionHasErrors(['clave1' => 'El campo password es obligatorio']); // mostrar los errores en sesion

        //para afirmar que no existe Raul en tabla usuarios
        $this->assertDatabaseMissing('usuarios', [
            'name' => 'Raul',
        ]);
    } 


    /**
     * @test */
    /*function se_edita_usu()

    {
        $this->withoutExceptionHandling();

        //$user = factory(User::class)->create();
        $user = factory(Usuarios::class)->create([]);

        // usuarios/5/editar
        $this->get('usuarios/{$user->id}/editar')
             ->assertStatus(200)
             ->assertSee('Editar usuario');
    }
    */

    /**
     * @test */
    /*function actualizar_usuarios()

    {
        $user = factory(Usuarios::class)->create();

        $this->withoutExceptionHandling();

        $this->put('/usuarios/{$user->id}',[
            'nombre' => 'popo',
            'mail'=> 'opop@mail.com',
            'clave1' => '12345',
            'clave2' => '12345' ])
             ->assertRedirect('/usuarios/{$usu->id}');

        $this->assertDatabaseHas('usuarios',[
            'name' => 'Popo2',
            'email'=> 'popo2@mail.com',
            ]);
    }
    */

    /**
     * @test */
    function nombre_requerido_en_update()

    {
        $usu = factory(Usuarios::class)->create();

        //$this->withoutExceptionHandling();

        $this->from("usuarios/{$usu}/editar")
             ->put("usuarios/{$usu->id}",[
                'nombre' => '',
                'mail'=> 'popo@mail.com',
                'clave1' => 'qwe123',
                'clave2' => 'qwe123' ])
             ->assertRedirect("usuarios/{$usu}/editar")
             //->assertRedirect("usuarios/{$usu->id}")
             ->assertSessionHasErrors(['nombre']);

        $this->assertDatabaseHas('usuarios',[
                'email'=> 'popo2@mail.com',
            ]);        
    }

    /**
     * @test */
    function si_borro_usuario()

    {
        $this->withoutExceptionHandling();

        $usu = factory(Usuarios::class)->create();

        $this->delete("usuarios/{$usu->id}")
            ->assertRedirect('usuarios');

        //comprobamos que en la talba 'usuarios' no existe el id
        $this->assertDatabaseMissing('usuarios', [
            'id' => $usu->id
        ]);

        //$this->assertSame(0, User::count());
    }
}