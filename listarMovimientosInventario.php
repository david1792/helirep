<?php 
	session_start();
	require('DAO/MovimientoInventarioDAO.php');
	require('util/Conexion.php');

	if(isset($_SESSION['rol']) || $_SESSION['rol'] === 1){
		$id = $_GET['inventarioId'];
		$movimientoInventarioDAO = new MovimientoInventarioDAO();
		$filas = $movimientoInventarioDAO->listarMovimientos($id);

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
	 				<th>fecha_actualizacion</th>
	 				<th>tipo_movimiento</th>
	 				<th>descripcion</th>
	 			
	 		</thead>
	 		<tbody>
	 			<?php foreach ($filas as $fila): ?>
	 				<tr>
	 					<th><?php echo $fila->id; ?></th>
	 					<th><?php echo $fila->fecha_actualizacion; ?></th>
	 					<th><?php echo $fila->tipo_movimiento; ?></th>
	 					<th><?php echo $fila->descripcion; ?></th>
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