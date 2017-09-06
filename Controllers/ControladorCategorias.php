<?php 
require('../DAO/CategoriaDAO.php');
	require('../util/Conexion.php');

	$categoriaDAO = new CategoriaDAO();

	$id = $_POST['id'];
	$descripcion = $_POST['descripcion'];
	
	
	

	$categoriaDAO->actualizarCategoria($id, $descripcion);

 ?>