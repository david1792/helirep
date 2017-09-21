<?php 
	require('../DAO/ProyectoDAO.php');
	require('../DAO/SolicitudDAO.php');
	require('../DAO/ProductoDAO.php');
	require('../DAO/MovimientoSolicitudDAO.php');
	require('../DAO/ProductoSolicitud.php');
	require('../util/Conexion.php');

	$solicitudDAO = new SolicitudDAO();
	$proyectoDAO = new ProyectoDAO();
	$movimientoSolicitudDAO = new MovimientoSolicitudDAO();
	$movimientoInventarioDAO = new MovimientoInventarioDAO();
	$productoSolicitud = new ProductoSolicitud();
	$productoDAO = new  ProductoDAO();

	if (isset($_POST['crearProyecto'])) {

		$descripcion = $_POST['descripcion'];
		$fechaInicio = $_POST['fecha_inicio'];
		$fechaFin = $_POST['fecha_fin'];
		$usuario_id = $_POST['usuario_id'];
		$bodega_id = $_POST['bodega_id'];

		$proyectoDAO->crearProyecto($descripcion, $fechaInicio, $fechaFin, $usuario_id, $bodega_id);
		
	}if (isset($_POST['crearSolicitud'])) {
		echo "entro solicitud<br>";
		$descripcion = $_POST['descripcion'];
		$fechaSolicitud = $_POST['fecha_solicitud'];
		$proyecto_id = $_POST['proyecto_id'];
		$productoId = $_POST['producto'];

		$solicitudDAO->crearSolicitud($descripcion, $fechaSolicitud, $proyecto_id);
		$ultimaSolicitudInsertado = $solicitudDAO->listarUltumaSolicitudInsertada($proyecto_id);

		foreach ($ultimaSolicitudInsertado as $key) {
			$ultimoIdSolicitud = $key->proyecto_id;
			
		}

		$productoSolicitud->crearProductoSolicitud($ultimoIdSolicitud, $productoId);
		header("location:../listarProyectos.php");

	}if (isset($_POST['crearMovimiento'])) {
		$fechaActualizacion = $_POST['fecha_actualizacion'];
		$tipoMovimiento = $_POST['tipo_movimiento'];
		$descripcion = $_POST['descripcion'];
		$solicitudId = $_POST['Solicitud_id'];
		$bodega_id = $_POST['bodega_id'];
		echo "<br>";

		$movimientoSolicitudDAO->validarMovimiento($tipoMovimiento, $fechaActualizacion, $descripcion, $solicitudId);
		$movimientoInventarioDAO->crearMovimiento($bodega_id, $tipoMovimiento);
		//header("location:../listarProyectos.php");


	}if (isset($_POST['actualizarProyecto'])){

		$id = $_POST['id'];
		$descripcion = $_POST['descripcion'];
		$fechaInicio = $_POST['fecha_inicio'];
		$fechaFin = $_POST['fecha_fin'];
		$proyectoDAO->actualizarProyecto($id, $descripcion, $fechaInicio, $fechaFin);

	}else{

		echo "<h1>error, no existe esa opcion n00b saibot<h1/>";
	}

 ?>