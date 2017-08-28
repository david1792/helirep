<?php 
	session_start();
	if(isset($_SESSION['rol'])  || $_SESSION['rol'] === 2){

 ?>

 <!DOCTYPE html>
 <html>
	 <head>
	 	<?php require("template/template.php"); ?>
	 	<title>Inicio almacenista</title>
	 </head>
	 <body>
	 	<h1>Bienvenido: <?php echo $_SESSION['nombre']. " ". $_SESSION['apellido']?></h1>
	 	<a href="controllers/Logout.php">Cerrar Sesión</a>
	 </body>
 </html>

<?php 
	}else{




?>

 <!DOCTYPE html>
 <html>
	 <head>
	 	<?php require("template/template.php"); ?>
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