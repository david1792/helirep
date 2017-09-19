<?php 
	session_start();
	if(isset($_SESSION['rol']) || $_SESSION['rol'] === 1){
		require('DAO/ProveedorDAO.php');
		require('DAO/CategoriaDAO.php');
		require('DAO/InventarioDAO.php');
		require('util/Conexion.php');
		$proveedorDAO  = new proveedorDAO();
		$categoriaDAO  = new categoriaDAO();
		$inventarioDAO = new inventarioDAO();

		$filasProveedor = $proveedorDAO->listarProveedores();
		$filasCategorias = $categoriaDAO->listarCategorias();
		$filasInventarios = $inventarioDAO->listarTodosLosInventario();


 ?>

 <!DOCTYPE html>
 <html>
	 <head>
	 	<?php include("template/template.php"); ?>
	 	<title>Inicio jefe de taller</title>
	 </head>
	 <body>	

	 	<form action="Controllers/Controladorproductos.php" method="post">
			<br>
			<input type="hidden" name="crearProducto" value="">

	 		<label for="referencia">referencia</label>
	 		<input id="referencia" type="text" name="referencia" value="">
			<br>

	 		<label for="descripcion">descripcion</label>
	 		<input id="descripcion"  type="text" name="descripcion" value="">
			<br>
	 		<label for="cantidad">cantidad</label>
	 		<input id="cantidad"  type="number" name="cantidad" value="">
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
		 		<?php foreach ($filasCategorias as $fila): ?>
		 			<option value="<?php echo $fila->id; ?>"><?php echo $fila->descripcion; ?></option>
		 		<?php endforeach ?>
		 	</select> 		
	 		<br>

	 		<label for="inventario">inventario</label>
		 	<select id="inventario" name="inventario">
		 		<?php foreach ($filasInventarios as $fila): ?>
		 			<option value="<?php echo $fila->id; ?>"><?php echo $fila->id; ?></option>
		 		<?php endforeach ?>
		 	</select>
		 	<br>	

	 		<button name="enviarActualizar">enviar</button>

	 	</form>

	 </body>

 </html>

<?php 
	}else{

?>

 <!DOCTYPE html>
 <html>
	 <head>
	 	<?php include("template/template.php"); ?>
	 	<title>Inicio jefe de taller</title>
	 </head>
	 <body>
	 	<h1>Por favor inicie sesion, sera redirigido en 2 segundos</h1>
	 	<?php 
	 		print_r($_SESSION);
	 	 ?>
	 	<script>
            setTimeout("location.href = 'controllers/Logout.php';", 4000);
        </script>
	 </body>
 </html>

<?php 
		}

?>