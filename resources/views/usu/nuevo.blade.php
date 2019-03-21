@extends('layout')

@section('titulo', "Usuario nuevo")

@section('content')

    <h1 class="mt-5">{{ $titulo }}</h1>
    
    @if ($errors->any())
    <div class="alert alert-danger">
      <h6 class="mt-1">Corriga los errores</h6>  
    </div>        
    @endif

    {{-- <form method="post" action="{{ url('usuarios/crear') }}"> --}}
    {{-- <form method="post" action="{{ route('l_crear') }}"> --}}
    <form method="post" action="{{ route('l_crear') }}">
    {{--class="needs-validation" novalidate>--}}
      {{ csrf_field() }}
        
      <div class="form-group row">
        <label for="nombre" class="col-sm-4 col-form-label">*Ingrese nombre:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="nombre" placeholder="" value="{{ old('nombre') }}">
        </div>
        @if ($errors->has('nombre'))
          <p class="text-danger">{{ $errors->first('nombre') }}</p>
        @endif
      </div>
      
      <div class="form-group row">
        <label for="mail" class="col-sm-4 col-form-label">*Ingrese mail:</label>
        <div class="col-sm-6">
          <input type="email" class="form-control" name="mail" placeholder="xxxxx@mail.com" value="{{ old('mail') }}">
        </div>
        @if ($errors->has('mail'))
            <p class="text-danger">{{ $errors->first('mail') }}</p>
        @endif
      </div>

      <div class="form-group row">
        <label for="clave1" class="col-sm-4 col-form-label">*Ingrese clave:</label>
        <div class="col-sm-6">
          <input type="password" class="form-control" name="clave1" placeholder="mayor a 4 caracteres">
        </div>
          @if ($errors->has('clave1'))
              <p class="text-danger">{{ $errors->first('clave1') }}</p>
          @endif
      </div>      

      <div class="form-group row">
        <label for="clave2" class="col-sm-4 col-form-label">*Repita clave:</label>
        <div class="col-sm-6">
          <input type="password" class="form-control" name="clave2">
        </div>
          @if ($errors->has('clave2'))
              <p class="text-danger">{{ $errors->first('clave2') }}</p>
          @endif      
      </div>      

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

