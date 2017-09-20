<?php 
	session_start();
	require('DAO/ProyectoDAO.php');
	require('util/Conexion.php');

	if(isset($_SESSION['rol']) || $_SESSION['rol'] === 1){
		$proyectoDAO = new ProyectoDAO();
		$listaProyectos = $proyectoDAO->listarProyectos();

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
	 				<th>fecha de inicio</th>
	 				<th>fecha final</th>
	 				<th>usuario que hizo el ingreso</th>
	 				<th>bodega selecconada</th>
	 				<th>opciones</th>
	 			
	 		</thead>
	 		<tbody>
	 			<?php foreach ($listaProyectos as $fila): ?>
	 				<tr>
	 					<th><?php echo $fila->id; ?></th>
	 					<th><?php echo $fila->descripcion; ?></th>
	 					<th><?php echo $fila->fecha_inicio; ?></th>
	 					<th><?php echo $fila->fecha_fin; ?></th>
	 					<th><?php echo $fila->usuario_id; ?></th>
	 					<th><?php echo $fila->bodega_id; ?></th>
	 					<th><a href="editarProyecto.php?idProyecto=<?php echo $fila->id ?>">editar</a>
	 					    <a href="nuevaSolicitud.php?idProyecto=<?php echo $fila->id?>&bodega_id=<?php echo $fila->bodega_id ?>">nueva solicitud</a> 
	 					    <a href="listarSolicitudes.php?idProyecto=<?php echo $fila->id?>&bodega_id=<?php echo $fila->bodega_id ?>">listar solicitudes</a></th>
	 				</tr>
	 			<?php endforeach ?>

	 		</tbody>
	 	</table>

	 	<br>
	 	<a class="button" href="crearProyecto.php">ingresar proyecto</a>

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