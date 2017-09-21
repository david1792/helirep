<?php 
	session_start();
	require('DAO/SolicitudDAO.php');
	require('util/Conexion.php');

	if(isset($_SESSION['rol']) || $_SESSION['rol'] === 1){
		$solicitudDAO = new SolicitudDAO();
		$id = $_GET['idProyecto'];
		$idBodega = $_GET['bodega_id'];
		$filas = $solicitudDAO->listarSolicitudesPorProyecto($id);

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
	 				<th>descripcion</th>
	 				<th>fecha_solicitud</th>
	 				<th>opciones</th>
	 			
	 		</thead>
	 		<tbody>
	 			<?php foreach ($filas as $fila): ?>
	 				<tr>
	 					<th><?php echo $fila->id; ?></th>
	 					<th><?php echo $fila->descripcion; ?></th>
	 					<th><?php echo $fila->fecha_solicitud; ?></th>
	 					<th><a href="crearMovimiento.php?idSolicitud=<?php echo $fila->id ?>&idBodega=<?php echo $idBodega; ?>">nuevo movimiento</a> <a href="listarMovimientos.php?idSolicitud=<?php echo $fila->id ?>">listar movimiento</a></th>
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