<?php 
	session_start();
	if(isset($_SESSION['rol']) || $_SESSION['rol'] === 1){

 ?>

 <!DOCTYPE html>
 <html>
	 <head>
	 	<?php include("template/template.php"); ?>
	 	<title>Inicio jefe de taller</title>
	 </head>
	 <body>	

	 	<form action="Controllers/ControladorProveedores.php" method="post">
			<br>
			<input type="hidden" name="crearProveedor" value="">

	 		<label for="nombre">nombre</label>
	 		<input id="nombre" type="text" name="nombre" value="">
			<br>

	 		<label for="estado">estado</label>
		 	<select id="estado" name="estado">
		 			<option value="0">inactivo</option>
		 			<option value="1">activo</option>
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