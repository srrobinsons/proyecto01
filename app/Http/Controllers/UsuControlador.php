<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use App\Profesiones;
use Illuminate\Support\Facades\DB;

class UsuControlador extends Controller
{
    public function usu_indice()
    {
    	if(request()->has('empty')) {
    	$usu      = [];
    	}  else {
        //$usu = DB::table('usuarios')->get(); // Obtener registros desde la Base Datos
        $usu = Usuarios::all();           // Obtener registros con ELOQUENT
    	}

    	$titulo   = "Usuarios";

    	//return view('usu.index', 
    	//			['usu'   => $usu,
    	//			 'titulo'=> $titulo]);
    	return view('usu.index',compact('usu','titulo'));
    }

    public function usu_nuevo()
    {
    	//return 'Crear nuevo usuario';
    	$titulo = "Crear nuevo usuario";

    	return view('usu.nuevo',compact('titulo'));
    }

    public function usu_id($id)
    {    
    	$titulo = "Detalle de usuario # $id";
    	$id_usu = $id;
        //$datos_usu = Usuarios::find($id);
        $datos_usu  = Usuarios::findOrFail($id);
        $datos_prof = Profesiones::find($datos_usu->profesion_id);
        
    	return view('usu.info',compact('titulo','datos_prof','datos_usu'));
    }

    public function store()
    {
        //$data = request()->all();
        $data = request()->validate([ 
            'nombre' => 'required'
        ],[
            'nombre.required' => 'El campo nombre es obligatorio'
        ]);

        //if(empty($data['nombre'])) {
        //    return redirect('usuarios/nuevo')->withErrors([
        //        'nombre' => 'El campo nombre es obligatorio'
        //    ]);
        //}

        $data = request()->all();

            
        Usuarios::create([
            'name' => $data['nombre'],
            'email'=> $data['mail'],
            //'profesion_id' => $profesionId,
            'password' => bcrypt($data['clave1'])
        ]);

        //return 'Procesando info...';
        return redirect('usuarios');
    }    
}
