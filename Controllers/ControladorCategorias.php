<?php 
require('../DAO/CategoriaDAO.php');
	require('../util/Conexion.php');

	$categoriaDAO = new CategoriaDAO();

	if (isset($_POST['crearCategoria'])) {
		$descripcion = $_POST['descripcion'];
		$categoriaDAO->crearCategoria($descripcion);

	}else{

	$id = $_POST['id'];
	$descripcion = $_POST['descripcion'];
	$categoriaDAO->actualizarCategoria($id, $descripcion);

	}

 ?>