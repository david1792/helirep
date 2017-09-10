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

 	<form action="Controllers/ControladorCategorias.php" method="post">

		<br>
		<input type="hidden" name="crearCategoria" value="">
 		<label for="descripcion">descripcion</label>
 		<input id="descripcion" type="text" name="descripcion" value="">

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