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
		
	}else{

		$id = $_POST['id'];
		$descripcion = $_POST['descripcion'];
		$fechaInicio = $_POST['fecha_inicio'];
		$fechaFin = $_POST['fecha_fin'];
		$proyectoDAO->actualizarProyecto($id, $descripcion, $fechaInicio, $fechaFin);

	}

 ?>