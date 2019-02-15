@extends('layout')

@section('titulo', "Usuario nuevo")

@section('content')

    <h1 class="mt-5">{{ $titulo }}</h1>
      
    <!-- <form method="post" action="{{ url('usuarios/crear') }}"> -->
    <form method="post" action="{{ route('l_crear') }}">
      {{ csrf_field() }}
      Ingrese nombre:
      <input type="text" name="nombre"> 
      <br>
      Ingrese email:
      <input type="email" name="mail">
      <br>
      Ingrese clave:
      <input type="password" name="clave1"> 
      <br> 
      Repita clave: 
      <input type="password" name="clave2"> 
      <br>   
      <!--
      Profesion id: 
      <input type="text" name="profesion_id"> 
      <br>   
      -->
      <input type="submit" value="confirmar"> 
    </form>

    <br>
      <a href="{{ route('l_usuarios') }}"> - volver </a>    

@endsection

