<?php 
	require('template/template.php');
	require('util/Conexion.php');
	require('DAO/InventarioDAO.php');
	require('DAO/CategoriaDAO.php');

		try {
			$idProducto = $_GET['idProducto'];
			$db = new PDO("mysql:host=localhost;dbname=proyecto_php", "root", "");
			$filas = $db->query("select * from producto where id = '$idProducto'")->fetchAll(PDO::FETCH_OBJ);
			$filasInventario = $db->query("select * from inventario")->fetchAll(PDO::FETCH_OBJ);
			$filasCategoria = $db->query("select * from categoria")->fetchAll(PDO::FETCH_OBJ);
			$filasProveedor = $db->query("select * from proveedor")->fetchAll(PDO::FETCH_OBJ);

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
		<label for="estaVerificado">esta verificado?</label>
	 		<select id="estaVerificado" name="estaVerificado">
		 			<option value="1">si</option>
		 			<option value="0">no</option>
		 	</select> 	
		<br>
	 	<label for="proveedor">proveedor</label>
		 	<select id="proveedor" name="proveedor">
		 		<?php foreach ($filasProveedor as $fila): ?>
		 			<option value="<?php echo $fila->id; ?>"><?php echo $fila->nombre; ?></option>
		 		<?php endforeach ?>
		 	</select> 		
		<br>

	 	<label for="categoria">categoria</label>
		 	<select id="categoria" name="categoria">
		 		<?php foreach ($filasCategoria as $fila): ?>
		 			<option value="<?php echo $fila->id; ?>"><?php echo $fila->descripcion; ?></option>
		 		<?php endforeach ?>
		 </select> 		
	 	<br>
 		<label for="inventario">inventario</label>
	 	<select id="inventario" name="inventario">
	 		<?php foreach ($filasInventario as $fila): ?>
	 			<option value="<?php echo $fila->id; ?>"><?php echo $fila->bodega_id; ?></option>
	 		<?php endforeach ?>
	 	</select>
	 	<br>	
 		
 		<button name="enviarActualizar">enviar</button>
 	</form>

 </body>
 </html>