<?php 
	require('../DAO/InventarioDAO.php');
	require('../util/Conexion.php');

	$inventarioDAO = new InventarioDAO();

		$bodega = $_POST['bodega'];

		$inventarioDAO->crearInventario($bodega);
	
 ?>