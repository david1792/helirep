<?php 
	session_start();

	require('DAO/InventarioDAO.php');
	require('DAO/MovimientoSolicitudDAO.php');
	require('DAO/ProyectoDAO.php');
	require('util/Conexion.php');
	include("template/template.php");

	$inventarioDAO = new InventarioDAO();
	$movimientoSolicitudDAO = new MovimientoSolicitudDAO();

	if (isset($_POST['reporte1'])) {
		$productoReporte1 = $_POST['producto'];
		$fechaInventarioDesde = $_POST['fechaInventarioDesde'];
		$fechaInventarioHasta = $_POST['fechaInventarioHasta'];
		$filas = $inventarioDAO->listarMovimientosDeEntradaYSalida($productoReporte1, $fechaInventarioDesde, $fechaInventarioHasta);

		?>

		<!DOCTYPE html>
		<html>
		<head>
        <link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.min.css">
        <script type="text/javascript" charset="utf8" src="assets/js/jquery.dataTables.min.js"></script>

			<title></title>
		</head>
		<body>
			<div style="background-color: #fff; width: 70%;background-color: #D1C4E9">
			<table id="table" border="1" cellspacing="1" cellpadding="1">
				<thead>
					<td>tipo movimiento</td>
					<td>nombre</td>
					<td>referencia</td>
				</thead>
				<tbody>
					<?php foreach ($filas as $fila): ?>
						<tr>
							<td><?php echo $fila->tipo_movimiento ?></td>
							<td><?php echo $fila->nombre ?></td>
							<td><?php echo $fila->referencia ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			</div>
			<script type="text/javascript">
				$(document).ready(function() {
				    $('#table').DataTable( {
				        "language": {
				            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
				        }
				    } );
				} );
			</script>
		</body>
		</html>

		<?php
	}elseif (isset($_POST['reporte2'])) {
		$idProducto = $_POST['producto'];
		$filas = $movimientoSolicitudDAO->movimientosProductosAsignadosAPedidos($idProducto);
		  ?>

		<!DOCTYPE html>
		<html>
		<head>
			<link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.min.css">
	        <script type="text/javascript" charset="utf8" src="assets/js/jquery.dataTables.min.js"></script>

			<title></title>
		</head>
		<body>
			<div style="background-color: #fff; width: 70%;background-color: #D1C4E9">
			<table id="table" border="1" cellspacing="1" cellpadding="1">
				<thead>
					<td>tipo movimiento</td>
					<td>descripcion solicitud</td>
					<td>referencia producto</td>
				</thead>
				<tbody>
					<?php foreach ($filas as $fila): ?>
						<tr>
							<td><?php echo $fila->tipo_movimiento ?></td>
							<td><?php echo $fila->descripcion ?></td>
							<td><?php echo $fila->referencia ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			</div>
			<script type="text/javascript">
				$(document).ready(function() {
				    $('#table').DataTable( {
				        "language": {
				            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
				        }
				    } );
				} );
			</script>
			</body>
		</html>

		  <?php 

	}elseif (isset($_POST['reporte3'])) {
		echo "reporte3";
		$idSolicitud = $_POST['solicitud'];
		$idProducto = $_POST['producto'];
		$fechaMovimientoDesde = $_POST['fechaMovimientoDesde'];
		$fechaMovimientoHasta = $_POST['fechaMovimientoHasta'];
		$filas = $movimientoSolicitudDAO->movimientosProductosAsignadosAPedidos($idSolicitud, $idProducto, $fechaMovimientoDesde, $fechaMovimientoHasta);

	     ?>

		<!DOCTYPE html>
		<html>
		<head>
	        <link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.min.css">
	        <script type="text/javascript" charset="utf8" src="assets/js/jquery.dataTables.min.js"></script>
			<title></title>
		</head>
		<body>
			<div style="background-color: #fff; width: 70%;background-color: #D1C4E9">
			<table id="table" border="1" cellspacing="1" cellpadding="1">
				<thead>
					<td>tipo movimiento</td>
					<td>descripcion solicitud</td>
					<td>referencia producto</td>
				</thead>
				<tbody>
					<?php foreach ($filas as $fila): ?>
						<tr>
							<td><?php echo $fila->tipo_movimiento ?></td>
							<td><?php echo $fila->descripcion ?></td>
							<td><?php echo $fila->referencia ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			</div>
			<script type="text/javascript">
				$(document).ready(function() {
				    $('#table').DataTable( {
				        "language": {
				            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
				        }
				    } );
				} );
			</script>
			</body>
		</html>

		<?php 

	}


 ?>