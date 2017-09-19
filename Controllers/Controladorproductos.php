<?php 
	require('../DAO/ProductoDAO.php');
	require('../util/Conexion.php');


	$productoDAO = new ProductoDAO();

	if (isset($_POST['crearProducto'])) {

		$referencia = $_POST['referencia'];
		$descripcion = $_POST['descripcion'];
		$estaVerificado = $_POST['estaVerificado'];
		$cantidad = $_POST['cantidad'];
		$proveedor = $_POST['proveedor'];
		$categoria = $_POST['categoria'];
		$inventario = $_POST['inventario'];

		$productoDAO->crearProducto($referencia, $descripcion, $estaVerificado, $cantidad, $proveedor, $categoria, $inventario);
		
	}else{

		$id = $_POST['id'];
		$referencia = $_POST['referencia'];
		$descripcion = $_POST['descripcion'];
		$estaVerificado = $_POST['estaVerificado'];
		$cantidad = $_POST['cantidad'];
		$proveedor = $_POST['proveedor'];
		$categoria = $_POST['categoria'];
		$inventario = $_POST['inventario'];
		
		$productoDAO->actualizarProducto($id, $referencia, $descripcion, $estaVerificado, $cantidad, $proveedor, $categoria, $inventario);

	}	
 ?>