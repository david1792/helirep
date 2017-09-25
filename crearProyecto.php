<?php 
	session_start();
	if(isset($_SESSION['rol']) || $_SESSION['rol'] === 1){
		require('DAO/UsuarioDAO.php');
		require('DAO/ProyectoDAO.php');
		require('DAO/BodegaDAO.php');
		require('util/Conexion.php');

		$usuarioDAO = new UsuarioDAO();
		$filas = $usuarioDAO->listarUsuarios(); 
		$bodegaDAO = new BodegaDAO();
		$filasBodegas = $bodegaDAO->listarBodegas();
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

			<input type="hidden" name="crearProyecto" value="">
	 		<label for="descripcion">descripcion</label>
	 		<input id="descripcion" type="text" name="descripcion" value="">
			<br>

	 		<label for="fecha_inicio">fecha_inicio</label>
	 		<input id="fecha_inicio"  type="text" name="fecha_inicio" value="">
			<br>

	 		<label for="fecha_fin">fecha_fin</label>
	 		<input id="fecha_fin" type="text" name="fecha_fin" value="">
			<br>

	 		<label for="usuario_id">usuario</label>
		 	<select id="usuario_id" name="usuario_id">
		 		<?php foreach ($filas as $fila): ?>
		 			<option value="<?php echo $fila->id; ?>"><?php echo $fila->nombre; ?></option>
		 		<?php endforeach ?>
		 	</select>
		 	<br>

		 	<label for="bodega_id">seleccione bodega</label>
		 	<select id="bodega_id" name="bodega_id">
		 		<?php foreach ($filasBodegas as $fila): ?>
		 			<option value="<?php echo $fila->id; ?>"><?php echo $fila->nombre; ?></option>
		 		<?php endforeach ?>
		 	</select>
		 	<br>		

	 		<button name="enviarActualizar">enviar</button>

	 	</form>

	 </body>
 	<script type="text/javascript">
 		  $( function() {
		    $("#fecha_inicio").datepicker({
		     dateFormat: 'yy-mm-dd'
		      });
		  });

 		  $( function() {
		    $("#fecha_fin").datepicker({
		     dateFormat: 'yy-mm-dd'
		      });
		  });

 	</script>
 	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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