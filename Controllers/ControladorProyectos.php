<?php 
require('../DAO/ProyectoDAO.php');
	require('../util/Conexion.php');

	$proyectoDAO = new ProyectoDAO();

	if (isset($_POST['crearProyecto'])) {

		$descripcion = $_POST['descripcion'];
		$fechaInicio = $_POST['fecha_inicio'];
		$fechaFin = $_POST['fecha_fin'];
		$usuario_id = $_POST['usuario_id'];

		$proyectoDAO->crearProyecto($descripcion, $fechaInicio, $fechaFin, $usuario_id);
		
	}if (isset($_POST['crearSolicitud'])) {
		$descripcion = $_POST['descripcion'];
		$fechaSolicitud = $_POST['fecha_solicitud'];
		$proyecto_id = $_POST['proyecto_id'];
		echo $descripcion. $fechaSolicitud. $proyecto_id;

	}else{

		$id = $_POST['id'];
		$descripcion = $_POST['descripcion'];
		$fechaInicio = $_POST['fecha_inicio'];
		$fechaFin = $_POST['fecha_fin'];
		$proyectoDAO->actualizarProyecto($id, $descripcion, $fechaInicio, $fechaFin);

	}

 ?>