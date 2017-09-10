<?php 
	require('template/template.php');

		try {
			$idUsuario = $_GET['idUsuario'];
			$db = new PDO("mysql:host=localhost;dbname=proyecto_php", "root", "");
			$filas = $db->query("select * from usuario where id = '$idUsuario'")->fetchAll(PDO::FETCH_OBJ);
			
	} catch (PDOException $e) {
			echo $e;
		
	}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Editar usuario</title>
 </head>
 <body>

 	<form action="Controllers/ControladorUsuarios.php" method="post">
		<br>
		<input type="hidden" name="id" value="<?php echo $filas[0]->id ?>">
 		<label for="nombre">nombre</label>
 		<input id="nombre" type="text" name="nombre" value="<?php echo $filas[0]->nombre ?>">
		<br>
 		<label for="apellido">apellido</label>
 		<input id="apellido"  type="text" name="apellido" value="<?php echo $filas[0]->apellido ?>">
		<br>
 		<label for="contrasena">contrasena</label>
 		<input id="contrasena" type="text" name="contrasena" value="<?php echo $filas[0]->contrasena ?>">
		<br>
 		<label for="documento">documento</label>
 		<input id="documento" type="text" name="documento" value="<?php echo $filas[0]->documento ?>">
		<br>
 		<label for="estado">estado</label>
 		<input id="estado" type="number" min="0" max="1" name="estado" value="<?php echo $filas[0]->estado ?>">
 		<br>
 		<label for="rol">rol</label>
 		<input id="rol" type="number" min="1" max="2" name="rol" value="<?php echo $filas[0]->rol ?>">

 		<button name="enviarActualizar">enviar</button>
 	</form>

 </body>
 </html>