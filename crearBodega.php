<?php 
	session_start();
	if(isset($_SESSION['rol']) || $_SESSION['rol'] === 1){
		require('DAO/UsuarioDAO.php');
		require('util/Conexion.php');

		$usuarioDAO = new UsuarioDAO();
		$filas = $usuarioDAO->listarUsuarios(); 
 ?>

 <!DOCTYPE html>
 <html>
	 <head>
	 	<?php include("template/template.php"); ?>
	 	<title>Inicio jefe de taller</title>
	 </head>
	 <body>	

 	<form action="Controllers/ControladorBodega.php" method="post">
		<br>
		<input type="hidden" name="crearBodega" value="">

 		<label for="direccion">direccion</label>
 		<input id="direccion" type="text" name="direccion" value="">
		<br>

 		<label for="nombre">nombre</label>
 		<input id="nombre"  type="text" name="nombre" value="">
		<br>

 		<label for="estado">estado</label>
	 	<select id="estado" name="estado">
	 			<option value="0">inactivo</option>
	 			<option value="1">activo</option>
	 	</select> 		
 		<br>

 		<label for="usuario_id">responsable bodega</label>
	 	<select id="usuario_id" name="usuario_id">
	 		<?php foreach ($filas as $fila): ?>
	 			<option value="<?php echo $fila->id; ?>"><?php echo $fila->nombre; ?></option>
	 		<?php endforeach ?>
	 	</select>
	 	<br>	

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