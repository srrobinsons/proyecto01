@extends('layout')

@section('titulo', "Usuario {$id_usu}")
 
@section('content')
        <h1 class="mt-5">Usuario #{{ $id_usu }}</h1>
        Detalle de usuario: {{ $id_usu }}    
@endsection
