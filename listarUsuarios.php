<?php 
	session_start();
	require('DAO/UsuarioDAO.php');
	require('util/Conexion.php');

	if(isset($_SESSION['rol']) || $_SESSION['rol'] === 1){
		$usuarioDAO = new UsuarioDAO();
		$listaUsuarios = $usuarioDAO->listarUsuarios();

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
	 				<th>nombre</th>
	 				<th>apellido</th>
	 				<th>contrasena</th>
	 				<th>documento</th>
	 				<th>estado</th>
	 				<th>rol</th>
	 				<th>opciones</th>
	 			
	 		</thead>
	 		<tbody>
	 			<?php foreach ($listaUsuarios as $usuarios): ?>
	 				<tr>
	 					<th><?php echo $usuarios->id; ?></th>
	 					<th><?php echo $usuarios->nombre; ?></th>
	 					<th><?php echo $usuarios->apellido; ?></th>
	 					<th><?php echo $usuarios->contrasena; ?></th>
	 					<th><?php echo $usuarios->documento; ?></th>
	 					<th><?php echo $usuarios->estado; ?></th>
	 					<th><?php echo $usuarios->rol; ?></th>
	 					<th><a href="editarUsuario.php?idUsuario=<?php echo $usuarios->id ?>">editar</a></th>
	 				</tr>
	 			<?php endforeach ?>

	 		</tbody>
	 	</table>

	 	<br>
	 	<a class="button" href="crearUsuario.php">ingresar usuario</a>

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