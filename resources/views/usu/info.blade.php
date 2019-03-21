@extends('layout')

@section('titulo', "Usuario $datos_usu->id ")
 
@section('content')
		@if (!empty($titulo))
        	<h1 class="mt-5">Usuario #{{ $datos_usu->id }} {{ $titulo }}</h1>
		@else
			<h1 class="mt-5">Usuario #{{ $datos_usu->id }}</h1>		
        @endif

        Detalle de usuario: {{ $datos_usu->name }} <br>
        email = {{ $datos_usu->email }} <br>
        {{-- profesion = {{ $datos_prof->titulo }} <br> --}}
        password = xxxxxxx <br>
        <br>
        @php
			$usu = $datos_usu;
		@endphp
        <form action="{{ route('l_edit',$datos_usu) }}">
    		<input type="submit" value="Editar" />
		</form>
        <a href="{{ route('l_usuarios') }}"> - volver </a>

@endsection
