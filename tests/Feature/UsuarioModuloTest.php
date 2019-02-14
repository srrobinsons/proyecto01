<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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

    /**
     * @test */
    function usuarios_nuevo()
    {
        $this->get('/usuarios/nuevo')
             ->assertStatus(200)
             ->assertSee('Crear nuevo usuario');
    }

}