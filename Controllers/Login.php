<?php 
	require('../util/Conexion.php');
	require('../DTO/UsuarioDTO.php');
	require('../DAO/UsuarioDAO.php');
	
	$documento = $_POST['documento'];
	$contrasena = $_POST['contrasena'];

	if ($documento != null && $contrasena != null) {
		echo "no son nulos";
		$usuarioDAO = new UsuarioDAO();
		$usuarioDAO->validarUsuario($documento, $contrasena);
	}


 ?>