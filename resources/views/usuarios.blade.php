<!doctype html>
<html> 
  <head>
  <meta charset="UFT-8">
  <meta name="viewport"
  		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

  <title>Listado de Usuarios</title> 
  </head> 
  <body>
<!--  	<h1>Usuarios</h1> -->
<!--	<h1><?php echo e($titulo) ?></h1> -->
<!--    <h1><?= e($titulo) ?></h1>

		<ul>
			<?php foreach ($usu as $usuarios) { ?>

			 <li><?php echo e($usuarios); ?></li>
			
			<?php } ?>

		</ul> -->

		<h1>{{ $titulo }}</h1>

		@if (!empty($usu))

			<ul>
				@foreach ($usu as $usuarios)

				 <li>{{$usuarios}}</li>
			
				@endforeach
			</ul>
		@else
			<p>No hay usuarios registrados</p>
		@endif

  </body> 
</html>
