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

 	<table  border="1" cellspacing="5" >
	 		<thead>
	 			
	 			<th>id</th>
	 			<th>descripcion</th>
	 			<th>opciones</th>

	 		</thead>
	 		<tbody>
	 			<?php foreach ($listarCategorias as $categoria): ?>
	 				<tr>
	 					<th><?php echo $categoria->id; ?></th>
	 					<th><?php echo $categoria->descripcion; ?></th>
	 					
	 					
	 					

	 					<th><a href="editarUsuario.php?idUsuario=<?php echo $usuarios->id ?>">editar</a></th>
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