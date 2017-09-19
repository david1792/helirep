<?php 
	require('../DAO/ProyectoDAO.php');
	require('../DAO/SolicitudDAO.php');
	require('../DAO/MovimientoSolicitudDAO.php');
	require('../util/Conexion.php');
	$solicitudDAO = new SolicitudDAO();
	$proyectoDAO = new ProyectoDAO();
	$movimientoSolicitudDAO = new MovimientoSolicitudDAO();

	if (isset($_POST['crearProyecto'])) {

		$descripcion = $_POST['descripcion'];
		$fechaInicio = $_POST['fecha_inicio'];
		$fechaFin = $_POST['fecha_fin'];
		$usuario_id = $_POST['usuario_id'];
		$bodega_id = $_POST['bodega_id'];

		$proyectoDAO->crearProyecto($descripcion, $fechaInicio, $fechaFin, $usuario_id, $bodega_id);
		
	}if (isset($_POST['crearSolicitud'])) {
		$descripcion = $_POST['descripcion'];
		$fechaSolicitud = $_POST['fecha_solicitud'];
		$proyecto_id = $_POST['proyecto_id'];

		$solicitudDAO->crearSolicitud($descripcion, $fechaSolicitud, $proyecto_id);

	}if (isset($_POST['crearMovimiento'])) {
		$fechaActualizacion = $_POST['fecha_actualizacion'];
		$tipoMovimiento = $_POST['tipo_movimiento'];
		$descripcion = $_POST['descripcion'];
		$solicitudId = $_POST['Solicitud_id'];

		$movimientoSolicitudDAO->crearMovimiento($fechaActualizacion, $tipoMovimiento, $descripcion, $solicitudId);

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