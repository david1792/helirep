<?php 
	session_start();
	require('DAO/ProductoDAO.php');
	require('util/Conexion.php');

	if(isset($_SESSION['rol']) || $_SESSION['rol'] === 1){
		$productoDAO = new ProductoDAO();
		$listarProductos = $productoDAO->listarProductos();

 ?>

 <!DOCTYPE html>
 <html>
	 <head>
	 	<?php include("template/template.php"); ?>
	 	<title>Inicio jefe de taller</title>
	 </head>
	 <body>

 	<table  border="1" cellspacing="5" >
	 		<thead>
	 			
	 				<th>id</th>
	 				<th>referencia</th>
	 				<th>descripcion</th>
	 				<th>esta verificado</th>
	 				<th>proveedor</th>
	 				<th>categoria</th>
	 				<th>inventario</th>
	 				<th>opciones</th>
	 			
	 		</thead>
	 		<tbody>
	 			<?php foreach ($listarProductos as $producto): ?>
	 				<tr>
	 					<th><?php echo $producto->id; ?></th>
	 					<th><?php echo $producto->referencia; ?></th>
	 					<th><?php echo $producto->descripcion; ?></th>
	 					<th><?php echo $producto->is_verificado; ?></th>
	 					<th><?php echo $producto->proveedor_id_proveedor; ?></th>
	 					<th><?php echo $producto->categoria_id_categoria; ?></th>
	 					<th><?php echo $producto->inventario_id; ?></th>
	 					
	 					<th><a href="editarProducto.php?idProducto=<?php echo $producto->id ?>">editar</a></th>
	 				</tr>
	 			<?php endforeach ?>

	 		</tbody>
	 	</table>

	 	<br>
	 	<a class="button" href="crearProducto.php">ingresar producto</a>

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