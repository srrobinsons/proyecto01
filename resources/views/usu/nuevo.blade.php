@extends('layout')

@section('titulo', "Usuario nuevo")

@section('content')

    <h1 class="mt-5">{{ $titulo }}</h1>
      
      <form method="post" action="no_creado.php">
      Ingrese nombre:
      <input type="text" name="nombre"> 
      <br>
      Ingrese clave:
      <input type="text" name="clave1"> 
      <br> 
      Repita clave: 
    <input type="text" name="clave2"> 
    <br>   
    <input type="submit" value="confirmar"> 
    </form>

@endsection

