@extends('layout')

@section('titulo', "Usuario $datos_usu->id ")
 
@section('content')
        <h1 class="mt-5">Usuario #{{ $datos_usu->id }}</h1>
        Detalle de usuario: {{ $datos_usu->name }} <br>
        email = {{ $datos_usu->email }} <br>
        profesion = {{ $datos_prof->titulo }} <br>
        password = xxxxxxx <br>
        <br>
        <a href="{{ route('l_usuarios') }}"> - volver </a>

@endsection
