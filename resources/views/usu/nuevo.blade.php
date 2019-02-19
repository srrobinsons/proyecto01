@extends('layout')

@section('titulo', "Usuario nuevo")

@section('content')

    <h1 class="mt-5">{{ $titulo }}</h1>
    
    @if ($errors->any())
    <div class="alert alert-danger">
      <h6 class="mt-1">Corriga los errores</h6>  
    {{--
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul> 
    --}}
    </div>        
    @endif                  

    {{-- <form method="post" action="{{ url('usuarios/crear') }}"> --}}
    {{-- <form method="post" action="{{ route('l_crear') }}"> --}}
    <form method="post" action="{{ route('l_crear') }}">
    {{--class="needs-validation" novalidate>--}}
      {{ csrf_field() }}
          
      *Ingrese nombre:
      <input type="text" name="nombre" placeholder="" value="{{ old('nombre') }}">
      @if ($errors->has('nombre'))
          <p class="text-danger">{{ $errors->first('nombre') }}</p>
      @endif

      <br>      
      *Ingrese email:
      <input type="email" name="mail" placeholder="xxxxx@mail.com" value="{{ old('mail') }}">
      @if ($errors->has('mail'))
          <p class="text-danger">{{ $errors->first('mail') }}</p>
      @endif

      <br>
      *Ingrese clave:
      <input type="password" name="clave1" placeholder="mayor a 4 caracteres">
      <br> 
      *Repita clave: 
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

