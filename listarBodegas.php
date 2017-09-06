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
	 				<th>direccion</th>
	 				<th>nombre</th>
	 				<th>estado</th>
	 				<th>usuario_id</th>
	 				
	 				
	 			
	 		</thead>
	 		<br><br>
	 		<tbody>
	 			<?php foreach ($listarBodegas as $bodega): ?>
	 				<tr>
	 					<th><?php echo $bodega->id; ?></th>
	 					<th><?php echo $bodega->direccion; ?></th>
	 					<th><?php echo $bodega->nombre; ?></th>
	 					<th><?php echo $bodega->estado; ?></th>
	 					<th><?php echo $bodega->usuario_id; ?></th>
	 					

	 					<th><a href="editarBodega.php?idBodega=<?php echo $bodega->id ?>">opciones</a></th>
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