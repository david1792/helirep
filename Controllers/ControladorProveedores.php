<?php 
require('../DAO/ProveedorDAO.php');
	require('../util/Conexion.php');

	$proveedorDAO = new ProveedorDAO();

	if (isset($_POST['crearProveedor'])) {

		$nombre = $_POST['nombre'];
		$estado = $_POST['estado'];
		$proveedorDAO->crearProveedor($nombre, $estado);
		
	}else{

		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$estado = $_POST['estado'];
		
		$proveedorDAO->actualizarProveedor($id, $nombre, $estado);

	}

 ?>