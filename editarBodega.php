<?php 
	require('template/template.php');

		try {
			$idBodega = $_GET['idBodega'];
			$db = new PDO("mysql:host=localhost;dbname=proyecto_php", "root", "");
			$filas = $db->query("select * from bodega where id = '$idBodega'")->fetchAll(PDO::FETCH_OBJ);
			
	} catch (PDOException $e) {
			echo $e;
		
	}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Editar bodega</title>
 </head>
 <body>

 	<form action="Controllers/ControladorBodega.php" method="post">
		<br>
		<input type="hidden" name="id" value="<?php echo $filas[0]->id ?>>
 		<label for="direccion">direccion</label>
 		<input id="direccion" type="text" name="direccion" value="<?php echo $filas[0]->direccion ?>">
		<br>
 		<label for="nombre">nombre</label>
 		<input id="nombre"  type="text" name="nombre" value="<?php echo $filas[0]->nombre ?>">
		<br>
 		<label for="estado">estado</label>
 		<input id="estado" type="text" name="estado" value="<?php echo $filas[0]->estado ?>">
		<br>
 		<label for="usuario_id">usuario</label>
 		<input id="usuario_id" type="text" name="usuario_id" value="<?php echo $filas[0]->usuario_id ?>">
		<br>
 		
 		
 		<button name="enviarActualizar">enviar</button>
 	</form>

 </body>
 </html>