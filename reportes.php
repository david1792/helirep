<?php 
	session_start();
	if(isset($_SESSION['rol']) || $_SESSION['rol'] === 1){
		require('DAO/ProductoDAO.php');
		require('DAO/SolicitudDAO.php');
		require('DAO/ProyectoDAO.php');
		require('util/Conexion.php');
		$productoDAO = new ProductoDAO();
		$listarProductos = $productoDAO->listarProductos();

		$solicitudDAO = new SolicitudDAO();
		$listarSolicitudes = $solicitudDAO->listarSolicitudes();

		$proyectoDAO = new ProyectoDAO();
		$listaProyectos = $proyectoDAO->listarProyectos();
 ?>

 <!DOCTYPE html>
 <html>
	 <head>
	 	<?php include("template/template.php"); ?>
	 	<title>Inicio jefe de taller</title>
	 </head>
	 <body>	

	 <br>

 	<form action="ControladorReportes.php" method="post">

 		<p>reporte de un producto del inventario y sus movimientos en tiempo establecido</p>
 		<br>
	 	<select id="producto" name="producto" required="true">
	 		<?php foreach ($listarProductos as $fila): ?>
	 			<option value="<?php echo $fila->id; ?>"><?php echo $fila->referencia; ?></option>
	 		<?php endforeach ?>
	 	</select>
 		<label for="producto">seleccione el producto</label>

	 	<input id="fechaInventarioDesde" type="text" name="fechaInventarioDesde" value="">
	 	<label for="fechaInventarioDesde">desde</label>
		<br>
	 	<input id="fechaInventarioHasta" type="text" name="fechaInventarioHasta" value="">
	 	<label for="fechaInventarioHasta">hasta</label>
		<br>

 		<button name="reporte1">enviar</button>

 	</form>

 	<br><br><br>

  	<form action="ControladorReportes.php" method="post">

 		<p>reporte de los Movimientos de los productos asignados a un pedido </p>
 		<br>
	 	<select id="producto" name="producto" required="true">
	 		<?php foreach ($listarSolicitudes as $fila): ?>
	 			<option value="<?php echo $fila->id; ?>"><?php echo $fila->descripcion; ?></option>
	 		<?php endforeach ?>
	 	</select>
 		<label for="producto">seleccione el pedido</label>

 		<button name="reporte2">enviar</button>

 	</form>

 	<br><br><br>

  	<form action="ControladorReportes.php" method="post">

 		<p>reporte de Movimientos Consolidados entre producto y Pedidos</p>
 		<br>
	 	<select id="solicitud" name="solicitud" required="true">
	 		<?php foreach ($listarSolicitudes as $fila): ?>
	 			<option value="<?php echo $fila->id; ?>"><?php echo $fila->descripcion; ?></option>
	 		<?php endforeach ?>
	 	</select>
 		<label for="solicitud">seleccione la solicitud</label>
	 	<br>
	 	 <br>
	 	<select id="producto" name="producto" required="true">
	 		<?php foreach ($listarProductos as $fila): ?>
	 			<option value="<?php echo $fila->id; ?>"><?php echo $fila->referencia; ?></option>
	 		<?php endforeach ?>
	 	</select>
 		<label for="producto">seleccione el producto</label>

	 	<input id="fechaMovimientoDesde" type="text" name="fechaMovimientoDesde" value="">
	 	<label for="fechaMovimientoDesde">desde</label>
		<br>
	 	<input id="fechaMovimientoHasta" type="text" name="fechaMovimientoHasta" value="">
	 	<label for="fechaMovimientoHasta">hasta</label>
		<br>

 		<button name="reporte3">enviar</button>

 	</form>
 	<br><br><br>
 	<br><br><br>
 	<br><br><br>
 	<br><br><br>


 	<script type="text/javascript">
 		  $( function() {
		    $("#fechaInventarioDesde").datepicker({
		     dateFormat: 'yy-mm-dd'
		     
		      });
		  });
 		  $( function() {
		    $("#fechaInventarioHasta").datepicker({
		     dateFormat: 'yy-mm-dd'
		     
		      });
		  });

 		  $( function() {
		    $("#fechaMovimientoDesde").datepicker({
		     dateFormat: 'yy-mm-dd'
		     
		      });
		  });
 		  $( function() {
		    $("#fechaMovimientoHasta").datepicker({
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