@extends('layout')

@section('titulo', "Usuarios")

@section('content')
	<h1 class="mt-5">{{ $titulo }}</h1>

	@if (!empty($usu))

		<ul>
			@foreach ($usu as $usuarios)

				<li>
					{{$usuarios}}
				</li>
			
			@endforeach
		</ul>
	@else
		<p>No hay usuarios registrados</p>
	@endif			

@endsection('content')

