<?php 
	require('template/template.php');

		try {
			$idProveedor = $_GET['idProveedor'];
			$db = new PDO("mysql:host=localhost;dbname=proyecto_php", "root", "");
			$filas = $db->query("select * from proveedor where id = '$idProveedor'")->fetchAll(PDO::FETCH_OBJ);
			
	} catch (PDOException $e) {
			echo $e;
		
	}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Editar proveedor</title>
 </head>
 <body>

 	<form action="Controllers/ControladorProveedores.php" method="post">
		<br>
		<input type="hidden" name="id" value="<?php echo $filas[0]->id ?>>
 		<label for="nombre">nombre</label>
 		<input id="nombre"  type="text" name="nombre" value="<?php echo $filas[0]->nombre ?>">
		<br>
 		<label for="estado">estado</label>
 		<input id="estado" type="text" name="estado" value="<?php echo $filas[0]->estado ?>">
		<br>
 		
 		
 		
 		<button name="enviarActualizar">enviar</button>
 	</form>

 </body>
 </html>