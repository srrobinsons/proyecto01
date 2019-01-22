<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeControlador extends Controller
{
    //
    public function __invoke($name, $nickname= null) {
		//convierte primer caracter en mayuscula
		$name = ucfirst($name);

		if ($nickname) {
			return "Hola {$name}, tu apodo es {$nickname}";
		} else {
			return "Hola {$name}, no tenes apodo";
		}

    }
}
