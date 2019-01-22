<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeModuloTest extends TestCase
{
    /**
     *@test */
    function welcome_con_nickname()
    {
        $this->get('saludo/jose/js')
        	 ->assertStatus(200)
        	 ->assertSee('Hola Jose, tu apodo es js');
    }	

    /**
     *@test */
    function welcome_sin_nickname()
    {
        $this->get('saludo/jose/')
        	 ->assertStatus(200)
        	 ->assertSee('Hola Jose, no tenes apodo');
    }	    
}
