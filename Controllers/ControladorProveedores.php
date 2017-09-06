<?php 
require('../DAO/ProveedorDAO.php');
	require('../util/Conexion.php');

	$proveedorDAO = new ProveedorDAO();

	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$estado = $_POST['estado'];
	
	

	$proveedorDAO->actualizarProveedor($id, $nombre, $estado);

 ?>