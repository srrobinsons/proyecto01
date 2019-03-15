@extends('layout')

@section('titulo', "Usuario a Editar")

@section('content')

    <h1 class="mt-5">Editar Usuarios</h1>
    
    @if ($errors->any())
    <div class="alert alert-danger">
      <h6 class="mt-1">Corriga los errores</h6>  
    </div>        
    @endif                  

    <form method="post" action="{{ route('l_usuarios') }}">

      {{ csrf_field() }}
      
      <div class="form-group row">
        <label for="nombre" class="col-sm-4 col-form-label">* Nombre:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="nombre" placeholder="" value="{{ $usu->name }}">
        </div>
        @if ($errors->has('nombre'))
          <p class="text-danger">{{ $errors->first('nombre') }}</p>
        @endif
      </div>
      
      <div class="form-group row">
        <label for="mail" class="col-sm-4 col-form-label">* Mail:</label>
        <div class="col-sm-6">
          <input type="email" class="form-control" name="mail" placeholder="xxxxx@mail.com" value="{{ $usu->email }}">
        </div>
        @if ($errors->has('mail'))
            <p class="text-danger">{{ $errors->first('mail') }}</p>
        @endif
      </div>

      <div class="form-group row">
        <label for="clave1" class="col-sm-4 col-form-label">* Clave Nueva:</label>
        <div class="col-sm-6">
          <input type="password" class="form-control" name="clave1" placeholder="mayor a 4 caracteres">
        </div>
          @if ($errors->has('clave1'))
              <p class="text-danger">{{ $errors->first('clave1') }}</p>
          @endif
      </div>

      <div class="form-group row">
        <label for="clave2" class="col-sm-4 col-form-label">*Repita Clave:</label>
        <div class="col-sm-6">
          <input type="password" class="form-control" name="clave2">
        </div>
          @if ($errors->has('clave2'))
              <p class="text-danger">{{ $errors->first('clave2') }}</p>
          @endif
      </div>

      <input type="submit" value="Actualizar usuario">
    </form>

    <br>
      <a href="{{ route('l_usuarios') }}"> - volver </a>

@endsection
