<?php 
	require('../DAO/BodegaDAO.php');
	require('../util/Conexion.php');

	$bodegaDAO = new BodegaDAO();

	if(isset($_POST['crearBodega'])){

		$direccion = $_POST['direccion'];
		$nombre = $_POST['nombre'];
		$estado = $_POST['estado'];
		$usuario_id = $_POST['usuario_id'];

		$bodegaDAO->crearBodega($direccion, $nombre, $estado, $usuario_id);

	}else{

		$id = $_POST['id'];
		$direccion = $_POST['direccion'];
		$nombre = $_POST['nombre'];
		$estado = $_POST['estado'];
		$usuario_id = $_POST['usuario_id'];

		$bodegaDAO->actualizarBodega($id, $direccion, $nombre, $estado, $usuario_id);
	}
 ?>