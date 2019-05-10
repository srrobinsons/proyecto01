<?php


Route::get('/', function() {
	return view('welcome');
})		->name('l_home');

Route::get('/usuarios','UsuControlador@usu_indice')
		->name('l_usuarios');

Route::get('/usuarios/nuevo','UsuControlador@usu_nuevo')
		->name('l_nuevo');

Route::post('/usuarios/crear','UsuControlador@store')
		->name('l_crear');

Route::get('/usuarios/{usu}/editar','UsuControlador@edit')
		->name('l_edit');

// $id, parametro que tomara de lo puesto en url
// ->where('id', '[0-9]+'), condicion para que id sean solo numeros
Route::get('/usuarios/{id}','UsuControlador@usu_id')   //porq usu_id pasa sin parm a controler	
		->name('l_usu_id')
		->where('id','[0-9]+');
		//->where('id','[A-Za-z_ ]+');
		//->where('id','[A-Za-z]+');

Route::post('/usuarios/{usu}','UsuControlador@update')
		->name('l_update');

// el ? en nickname es que no es obligatorio. Si no es obligatorio en function lo
// inicilizamos con null
Route::get('/saludo/{name}/{nickname?}','WelcomeControlador');

//Route::delete('/usuarios/{usu}','UsuControlador@destroy');

Route::delete('/usuarios/{usu}','UsuControlador@destroy')
		->name('l_destroy');
