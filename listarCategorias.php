<?php 
	session_start();
	require('DAO/CategoriaDAO.php');
	require('util/Conexion.php');

	if(isset($_SESSION['rol']) || $_SESSION['rol'] === 1){
		$categoriaDAO = new CategoriaDAO();
		$listarCategorias = $categoriaDAO->listarCategorias();

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
	 				<th>descripcion</th>
	 				
	 				
	 				
	 				
	 			
	 		</thead>
	 		<br><br>
	 		<tbody>
	 			<?php foreach ($listarCategorias as $categoria): ?>
	 				<tr>
	 					<th><?php echo $categoria->id; ?></th>
	 					<th><?php echo $categoria->descripcion; ?></th>
	 					
	 					
	 					

	 					<th><a href="editarUsuario.php?idUsuario=<?php echo $usuarios->id ?>">opciones</a></th>
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