<?php 
	require('template/template.php');
	require('util/Conexion.php');
	require('DAO/UsuarioDAO.php');
	$usuarioDAO = new UsuarioDAO();
	$listaUsuarios = $usuarioDAO->listarUsuarios();

	try {
		$idProyecto = $_GET['idProyecto'];
		$db = new PDO("mysql:host=localhost;dbname=proyecto_php", "root", "");
		$filas = $db->query("select * from proyecto where id = '$idProyecto'")->fetchAll(PDO::FETCH_OBJ);
			
	} catch (PDOException $e) {
			echo $e;
		
	}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Editar usuario</title>
 </head>
 <body>

 	<form action="Controllers/ControladorProyectos.php" method="post">
		<br>

		<input type="hidden" name="id" value="<?php echo $filas[0]->id ?>">
		<input type="hidden" name="actualizarProyecto" value="">

 		<label for="descripcion">descripcion</label>
 		<input id="descripcion" type="text" name="descripcion" value="<?php echo $filas[0]->descripcion ?>">
		<br>

 		<label for="fecha_inicio">fecha_inicio</label>
 		<input id="fecha_inicio"  type="text" name="fecha_inicio" value="<?php echo $filas[0]->fecha_inicio ?>">
		<br>

 		<label for="fecha_fin">fecha_fin</label>
 		<input id="fecha_fin" type="text" name="fecha_fin" value="<?php echo $filas[0]->fecha_fin ?>">
		<br>
 		<button name="enviarActualizar">enviar</button>
 	</form>
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

 </body>
 </html>