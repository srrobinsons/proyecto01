<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuControlador extends Controller
{
    public function usu_indice()
    {
    	//return 'Usuarios';
    	if(request()->has('empty')) {
    	$usu      = [];
    	}  else {
    	$usu      = ['Jose','Juan','Pedro','Mateo','Adolfo'];    		
    	}

    	$titulo   = "Usuarios";

    	// view(xxx, yyy)... xxx=nombre vista, yyy=variables a pasar
    	return view('usu.index', 
    				['usu'   => $usu,
    				 'titulo'=> $titulo]);
		/*
    	//otra forma de pasar hacer lo mismo que antes es
    	return view('usuarios')
			->with('usu',$usu)
			->with('titulo',$titulo);  		   
		*/
    	//otra forma de pasar hacer lo mismo que antes es, compact arma array asociativo
    	//return view('usuarios', compact('usu','titulo'));
    }

    public function usu_nuevo()
    {
    	//return 'Crear nuevo usuario';
    	$titulo = "Crear nuevo usuario";

    	return view('usu.nuevo',
    				['titulo' => $titulo]);
    }

    public function usu_id($id)
    {
    	//return "Detalle de usuario = {$id}";
    	
    	$titulo = "Detalle de usuario # $id";
    	$id_usu = $id;

    	return view('usu.info',
    				['titulo' => $titulo,
    				 'id_usu' => $id_usu]);
    }

}
