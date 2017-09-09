<?php 
	session_start();
	if(isset($_SESSION['rol']) || $_SESSION['rol'] === 1){
		require('DAO/UsuarioDAO.php');
		require('DAO/BodegaDAO.php');
		require('util/Conexion.php');

		$bodegaDAO = new BodegaDAO();
		$filas = $bodegaDAO->listarBodegas(); 
 ?>

 <!DOCTYPE html>
 <html>
	 <head>
	 	<?php include("template/template.php"); ?>
	 	<title>Inicio jefe de taller</title>
	 </head>
	 <body>	

 	<form action="Controllers/ControladorUsuarios.php" method="post">
		<br>
		<input type="hidden" name="crearUsuario" value="">
 		<label for="nombre">nombre</label>
 		<input id="nombre" type="text" name="nombre" value="">
		<br>
 		<label for="apellido">apellido</label>
 		<input id="apellido"  type="text" name="apellido" value="">
		<br>
 		<label for="contrasena">contrasena</label>
 		<input id="contrasena" type="text" name="contrasena" value="">
		<br>
 		<label for="documento">documento</label>
 		<input id="documento" type="text" name="documento" value="">
		<br>
 		<label for="estado">estado</label>
	 	<select id="estado" name="estado">
	 			<option value="0">inactivo</option>
	 			<option value="1">activo</option>
	 	</select> 		
		
 		<br>
 		<label for="bodega">Bodega</label>
	 	<select id="bodega" name="bodega">
	 		<?php foreach ($filas as $fila): ?>
	 			<option value="<?php echo $fila->id; ?>"><?php echo $fila->nombre; ?></option>
	 		<?php endforeach ?>
	 	</select>
	 	<br>	
		
 		<label for="roles">roles</label>
	 	<select id="roles" name="roles">
	 			<option value="1">jefe de taller</option>
	 			<option value="2">almacenista</option>
	 	</select> 

 		<button name="enviarActualizar">enviar</button>
 	</form>

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