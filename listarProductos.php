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
	 	<h1>Bienvenido: <?php echo $_SESSION['nombre']. " ". $_SESSION['apellido']?></h1>
	 	<a href="controllers/Logout.php">Cerrar Sesión</a><br><br><br>

	 	<a href="listarUsuarios.php" class="button">Listar usuarios</a>
	 	<a href="listarProductos.php" class="button">Listar productos</a>
	 	<a href="listarBodegas.php" class="button">Listar Bodegas</a>
	 	<a href="listarProveedores.php" class="button">Listar proveedores</a>
	 	<a href="listarCategorias.php" class="button">Listar categorias</a>
	
 

 	<table border="1" style="margin: center">
	 		<thead>
	 			
	 				<th>id</th>
	 				<th>referencia</th>
	 				<th>descripcion</th>
	 				<th>proveedor</th>
	 				<th>categoria</th>
	 				<th>inventario</th>
	 				
	 			
	 		</thead>
	 		<br><br>
	 		<tbody>
	 			<?php foreach ($listarProductos as $producto): ?>
	 				<tr>
	 					<th><?php echo $producto->id; ?></th>
	 					<th><?php echo $producto->referencia; ?></th>
	 					<th><?php echo $producto->descripcion; ?></th>
	 					<th><?php echo $producto->proveedor_id_proveedor; ?></th>
	 					<th><?php echo $producto->categoria_id_categoria; ?></th>
	 					<th><?php echo $producto->inventario_id; ?></th>
	 					
	 					<th><a href="editarProducto.php?idProducto=<?php echo $producto->id ?>">opciones</a></th>
	 				</tr>
	 			<?php endforeach ?>

	 		</tbody>
	 	</table>








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