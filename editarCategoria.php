<?php 
	require('template/template.php');

		try {
			$idCategoria = $_GET['idCategoria'];
			$db = new PDO("mysql:host=localhost;dbname=proyecto_php", "root", "");
			$filas = $db->query("select * from categoria where id = '$idCategoria'")->fetchAll(PDO::FETCH_OBJ);
			
	} catch (PDOException $e) {
			echo $e;
		
	}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Editar categoria</title>
 </head>
 <body>

 	<form action="Controllers/ControladorCategorias.php" method="post">
 	
		<br>
		<input type="hidden" name="id" value="<?php echo $filas[0]->id ?>">
 		<label for="descripcion">descripcion</label>
 		<input id="descripcion"  type="text" name="descripcion" value="<?php echo $filas[0]->descripcion ?>">
		<br>
 		
 		<button name="enviarActualizar">enviar</button>
 	</form>

 </body>
 </html>