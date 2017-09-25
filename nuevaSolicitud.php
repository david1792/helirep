<?php 
	session_start();
	if(isset($_SESSION['rol']) || $_SESSION['rol'] === 1){
		require('DAO/ProductoDAO.PHP');
		require('util/Conexion.php');

		$proyecto_id = $_GET['idProyecto'];
		$bodega_id = $_GET['bodega_id'];
		$ProductoDAO = new ProductoDAO();
		$filas = $ProductoDAO->listarProductosPorBodega($bodega_id);
 ?>

 <!DOCTYPE html>
 <html>
	 <head>
	 	<?php include("template/template.php"); ?>
	 	<title>Inicio jefe de taller</title>
	 </head>
	 <body>	

 	<form action="Controllers/ControladorProyectos.php" method="post">
		<br>
		<input type="hidden" name="crearSolicitud" value="">
		<input type="hidden" name="proyecto_id" value="<?php echo $_GET['idProyecto'] ?>">
		<input type="hidden" name="bodega_id" value="<?php echo $_GET['bodega_id'] ?>">

 		<label for="descripcion">descripcion</label>
 		<input id="descripcion" type="text" name="descripcion" value="" required="">
		<br>

	 	<label for="fecha_solicitud">fecha_solicitud</label>
	 	<input id="fecha_solicitud"  type="text" name="fecha_solicitud" value="" required="">
		<br>

 		<label for="producto">producto disponibles</label>
	 	<select id="producto" name="producto" required="true">
	 		<?php foreach ($filas as $fila): ?>
	 			<option value="<?php echo $fila->id; ?>"><?php echo $fila->referencia; ?></option>
	 		<?php endforeach ?>
	 	</select>
	 	<br>	
 		<button name="enviarActualizar">enviar</button>

 	</form>
 	<script type="text/javascript">
 		  $( function() {
		    $("#fecha_solicitud").datepicker({
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