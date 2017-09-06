<?php 
	require('../DAO/ProductoDAO.php');
	require('../util/Conexion.php');

	$productoDAO = new ProductoDAO();

	$id = $_POST['id'];
	$referencia = $_POST['referencia'];
	$descripcion = $_POST['descripcion'];
	$proveedor = $_POST['proveedor'];
	$categoria = $_POST['categoria'];
	$inventario = $_POST['inventario'];
	

	$productoDAO->actualizarProducto($id, $referencia, $descripcion, $proveedor, $categoria, $inventario);

 ?>