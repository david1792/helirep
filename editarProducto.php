<?php 
	require('template/template.php');

		try {
			$idProducto = $_GET['idProducto'];
			$db = new PDO("mysql:host=localhost;dbname=proyecto_php", "root", "");
			$filas = $db->query("select * from producto where id = '$idProducto'")->fetchAll(PDO::FETCH_OBJ);
			
	} catch (PDOException $e) {
			echo $e;
		
	}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Editar producto</title>
 </head>
 <body>

 	<form action="Controllers/Controladorproductos.php" method="post">
		<br>
		<input type="hidden" name="id" value="<?php echo $filas[0]->id ?>>
 		<label for="referencia">referencia</label>
 		<input id="referencia" type="text" name="referencia" value="<?php echo $filas[0]->referencia ?>">
		<br>
 		<label for="descripcion">descripcion</label>
 		<input id="descripcion"  type="text" name="descripcion" value="<?php echo $filas[0]->descripcion ?>">
		<br>
 		<label for="proveedor">proveedor</label>
 		<input id="proveedor" type="text" name="proveedor" value="<?php echo $filas[0]->proveedor_id_proveedor ?>">
		<br>
 		<label for="categoria">categoria</label>
 		<input id="categoria" type="text" name="categoria" value="<?php echo $filas[0]->categoria_id_categoria ?>">
		<br>
 		<label for="inventario">inventario</label>
 		<input id="inventario" type="text" name="inventario" value="<?php echo $filas[0]->inventario_id ?>">
 		<br>
 		
 		<button name="enviarActualizar">enviar</button>
 	</form>

 </body>
 </html>