<?php 
require('../DAO/ProyectoDAO.php');
	require('../util/Conexion.php');

	$proyectoDAO = new ProyectoDAO();

	if (isset($_POST['crearProveedor'])) {

		$descripcion = $_POST['descripcion'];
		$fechaInicio = $_POST['fecha_inicio'];
		$fechaFin = $_POST['fecha_fin'];
		$proyectoDAO->crearProyecto($nombre, $estado);
		
	}else{

		$id = $_POST['id'];
		$descripcion = $_POST['descripcion'];
		$fechaInicio = $_POST['fecha_inicio'];
		$fechaFin = $_POST['fecha_fin'];
		$proyectoDAO->actualizarProyecto($id, $descripcion, $fechaInicio, $fechaFin);

	}

 ?>