<!doctype html>
<html> 
  <head>
  <meta charset="UFT-8">
  <meta name="viewport"
  		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

  <title>Usuario Nuevo</title> 
  </head> 
  <body>
		<h1>{{ $titulo }}</h1>
  		
  		<form method="post" action="no_creado.php">
  		Ingrese nombre:
  		<input type="text" name="nombre"> 
  		<br>
  		Ingrese clave:
  		<input type="text" name="clave1"> 
  		<br> 
  		Repita clave: 
		<input type="text" name="clave2"> 
		<br>   
		<input type="submit" value="confirmar"> 
		</form>
  </body> 
</html>
