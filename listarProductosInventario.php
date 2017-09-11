<?php 
	session_start();
	require('DAO/ProductoDAO.php');
	require('util/Conexion.php');

	if(isset($_SESSION['rol']) || $_SESSION['rol'] === 1){
		$id = $_GET['inventarioId'];
		$productoDAO = new ProductoDAO();
		$filas = $productoDAO->listarProductosPorInventarios($id);

 ?>

 <!DOCTYPE html>
 <html>
	 <head>
	 	<?php include("template/template.php"); ?>
	 	<title>Inicio jefe de taller</title>
	 </head>
	 <body>

	 	<table border="1" cellspacing="5" >
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
	 			<?php foreach ($filas as $fila): ?>
	 				<tr>
	 					<th><?php echo $fila->id; ?></th>
	 					<th><?php echo $fila->referencia; ?></th>
	 					<th><?php echo $fila->descripcion; ?></th>
	 					<th><?php echo $fila->is_verificado; ?></th>
	 					<th><?php echo $fila->proveedor_id_proveedor; ?></th>
	 					<th><?php echo $fila->categoria_id_categoria; ?></th>
	 					<th><?php echo $fila->inventario_id; ?></th>
	 					

	 					<th><a href="listarProductosInventario.php?idSolicitud=<?php echo $fila->id ?>">ver productos inventario</a> 
	 				</tr>
	 			<?php endforeach ?>

	 		</tbody>
	 	</table>

	 	<br>

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