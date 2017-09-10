<?php 
	session_start();
	if(isset($_SESSION['rol']) || $_SESSION['rol'] === 1){
		$Solicitud_id = $_GET['idSolicitud'];

 ?>

 <!DOCTYPE html>
 <html>
	 <head>
	 	<?php include("template/template.php"); ?>
	 	<title>Inicio jefe de taller</title>
	 </head>
	 <body>	

 	<form action="Controllers/ControladorProyectos.php" method="post">
		<input type="hidden" name="crearMovimiento" value="">
		<input type="hidden" name="Solicitud_id" value="<?php echo $_GET['idSolicitud'] ?>">
		<br>

	 	<label for="fecha_actualizacion">fecha_actualizacion</label>
	 	<input id="fecha_actualizacion"  type="text" name="fecha_actualizacion" value="" required="">
		<br>

	 	<label for="tipo_movimiento">tipo_movimiento</label>
	 	<select id="tipo_movimiento" name="tipo_movimiento">
	 			<option value="entregado">entregado</option>
	 			<option value="devolucion">devolucion</option>
	 	</select> 
		<br>

 		<label for="descripcion">descripcion</label>
 		<input id="descripcion" type="text" name="descripcion" value="" required="">
		<br>

 		<button name="enviarActualizar">enviar</button>

 	</form>
 	<script type="text/javascript">
 		  $( function() {
		    $("#fecha_actualizacion").datepicker({
		     dateFormat: 'yy-mm-dd'
		      });
		  });

 	</script>
 	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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