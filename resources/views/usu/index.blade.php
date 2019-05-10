@extends('layout')

@section('titulo', "Usuarios")

@section('content')
	<h1 class="mt-5">{{ $titulo }}</h1>

	@if (!empty($usu))

		<ul>
			@foreach ($usu as $usuarios)

				<li>
					<form action="{{ route('l_destroy',$usuarios) }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						{{$usuarios->name}}						
						<a href="{{ route('l_usu_id',$usuarios->id) }}" class="btn btn-link"> - ver info </a> |
						<a href="{{ route('l_edit',$usuarios) }}" class="btn btn-link">Editar</a> |
    					<button type="submit" class="btn btn-link">Eliminar</button>
					</form>
				</li>
			
			@endforeach
		</ul>
	@else
		<p>No hay usuarios registrados</p>
	@endif			

@endsection('content')
