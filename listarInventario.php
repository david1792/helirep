<?php 
	session_start();
	require('DAO/InventarioDAO.php');
	require('util/Conexion.php');

	if(isset($_SESSION['rol']) || $_SESSION['rol'] === 1){
		$inventarioDAO = new InventarioDAO();
		$id = $_GET['idBodega'];
		$filas = $inventarioDAO->listarInventarios($id);

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
	 				<th>cantidad</th>
	 				<th>bodega_id</th>
	 				<th>opciones</th>
	 			
	 		</thead>
	 		<tbody>
	 			<?php foreach ($filas as $fila): ?>
	 				<tr>
	 					<th><?php echo $fila->id; ?></th>
	 					<th><?php echo $fila->cantidad; ?></th>
	 					<th><?php echo $fila->bodega_id; ?></th>
	 					<th><a href="listarProductosInventario.php?inventarioId=<?php echo $fila->id ?>">ver productos inventario</a> 
	 				</tr>
	 			<?php endforeach ?>

	 		</tbody>
	 	</table>

	 	<br>
	 	<a class="button" href="crearInventario.php">ingresar inventario</a>

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