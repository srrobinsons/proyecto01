<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function() {
	return view('welcome');
})->name('l_home');

Route::get('/usuarios','UsuControlador@usu_indice')
		->name('l_usuarios');


Route::get('/usuarios/nuevo','UsuControlador@usu_nuevo')
		->name('l_nuevo');

// $id, parametro que tomara de lo puesto en url
// ->where('id', '[0-9]+'), condicion para que id sean solo numeros
Route::get('/usuarios/{id}','UsuControlador@usu_id')   //porq usu_id pasa sin parm a controler
	//->where('id', '[0-9]+');
	  ->where('id','[A-Za-z]+')
	  ->name('l_usu_id');

// el ? en nickname es que no es obligatorio. Si no es obligatorio en function lo
// inicilizamos con null
Route::get('/saludo/{name}/{nickname?}','WelcomeControlador');

