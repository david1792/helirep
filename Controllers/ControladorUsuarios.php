<?php 
	require('../DAO/UsuarioDAO.php');
	require('../util/Conexion.php');

	$usuarioDAO = new UsuarioDAO();

	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$contrasena = $_POST['contrasena'];
	$documento = $_POST['documento'];
	$rol = $_POST['rol'];
	$estado = $_POST['estado'];

	$usuarioDAO->actualizarUsuario($id, $nombre, $apellido, $contrasena, $documento, $estado, $rol);

 ?>