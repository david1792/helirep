<?php 
	session_start();
	require('DAO/BodegaDAO.php');
	require('util/Conexion.php');

	if(isset($_SESSION['rol']) || $_SESSION['rol'] === 1){
		$bodegaDAO = new BodegaDAO();
		$listarBodegas = $bodegaDAO->listarbodegas();

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
	 			<th>direccion</th>
	 			<th>nombre</th>
	 			<th>estado</th>
	 			<th>usuario_id</th>
	 			<th>opciones</th>

	 		</thead>
	 		<tbody>
	 			<?php foreach ($listarBodegas as $bodega): ?>
	 				<tr>
	 					<th><?php echo $bodega->id; ?></th>
	 					<th><?php echo $bodega->direccion; ?></th>
	 					<th><?php echo $bodega->nombre; ?></th>
	 					<th><?php echo $bodega->estado; ?></th>
	 					<th><?php echo $bodega->usuario_id; ?></th>
	 					
	 					<th><a href="editarBodega.php?idBodega=<?php echo $bodega->id ?>">editar</a> 
	 						<a href="listarInventario.php?idBodega=<?php echo $bodega->id ?>">ver inventario</a></th>
	 				</tr>
	 			<?php endforeach ?>

	 		</tbody>
	 	</table>

	 	<br>
	 	<a class="button" href="crearBodega.php">ingresar bodega</a>

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