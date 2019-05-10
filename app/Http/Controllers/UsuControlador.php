<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use App\Profesiones;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

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
    	//$titulo = "Detalle de usuario # $id";
        $titulo = "";
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
            'nombre'  => 'required',
            'mail'    =>['required','email','unique:usuarios,email'],
            'clave1'  =>['required','alpha_num','between:4,14'],
            'clave2'  =>['required','alpha_num','between:4,14'],
        ],[
            'nombre.required'  => 'El campo nombre es obligatorio'             ,
            'mail.required'    => 'El campo email es obligatorio'              ,
            'mail.email'       => 'El mail debe tener formato ejemplo@mail.com',
            'mail.unique'      => 'El mail ya esta registrado'                 ,
            'clave1.required'  => 'El campo password es obligatorio'           ,
            'clave1.alpha_num' => 'El password admite solo alfanumericos'      ,
            'clave1.between'   => 'El password debe tener de 4 a 14 caracteres',
            'clave2.required'  => 'El campo password es obligatorio'           ,
            'clave2.alpha_num' => 'El password admite solo alfanumericos'      ,
            'clave2.between'   => 'El password debe tener de 4 a 14 caracteres'
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


    //public function edit($id)
    public function edit(Usuarios $usu)
    {
        //$id_usu = $id;
        //$usu  = Usuarios::findOrFail($id);
        //$datos_prof = Profesiones::find($usu->profesion_id);
        //dd($usu);

        return view('usu.edit',['usu' => $usu]);
    }

    public function update(Usuarios $usu)
    {
        $titulo = "Actualizado";
        //$datos_usu  = Usuarios::findOrFail($id);
        //$datos_prof = Profesiones::find($datos_usu->profesion_id);
        $datos_prof = '';

        $data = request()->validate([   //obtenemos datos formulario
            'nombre' => 'required'                                     ,
            'mail'   =>['required','email','unique:usuarios,email,'.$usu->id] ,
            //'mail'   =>['required','email',Rule::unique('usuarios')->ignore($usu->id)],
            'clave1' =>['required','alpha_num','between:4,14']         ,
            'clave2' =>['required','alpha_num','between:4,14']         ,
        ],[
            'nombre.required'  => 'El campo nombre es obligatorio'             ,
            'mail.required'    => 'El campo email es obligatorio'              ,
            'mail.email'       => 'El mail debe tener formato ejemplo@mail.com',
            'clave1.required'  => 'El campo password es obligatorio'           ,
            'clave1.alpha_num' => 'El password admite solo alfanumericos'      ,
            'clave1.between'   => 'El password debe tener de 4 a 14 caracteres',            
            'clave2.required'  => 'El campo password es obligatorio'           ,
            'clave2.alpha_num' => 'El password admite solo alfanumericos'      ,
            'clave2.between'   => 'El password debe tener de 4 a 14 caracteres',
        ]);

        if ($data['clave1'] !== $data['clave1']) {
            dd("Las claves no son iguales");
        } 

        $usu['name']     = $data['nombre'];
        $usu['email']    = $data['mail'];
        $usu['password'] = bcrypt($data['clave1']);
        $usu->update($data);

        //return redirect()->route('l_usu_id',
        //                        ['titulo'    =>$titulo,
        //                         'datos_prof'=>$datos_prof,
        //                         'datos_usu' =>$usu ]); 
        
        return view('usu.info',
                                ['titulo'    =>$titulo,
                                 'datos_prof'=>$datos_prof,
                                 'datos_usu' =>$usu ]);
    }

    public function destroy(Usuarios $usu)
    {
        $usu->delete();
        //return redirect('usuarios');
        return redirect()->route('l_usuarios');
    }    
}