<?php 
	
	class ProductoDAO{

		function listarProductos(){
			$con = conexion::getConexion();
			$query = $con->query("SELECT * FROM Producto")->fetchAll(PDO::FETCH_OBJ);
			
			return $query;

		}

		function listarProductosPorInventarios($id){
			$con = conexion::getConexion();
			$query = $con->prepare("SELECT * FROM producto WHERE inventario_id = :id");
			$query->bindParam(":id", $id, PDO::PARAM_INT);
			$query->execute();
			$filas = $query->fetchAll(PDO::FETCH_OBJ);
			return $filas;

		}

		function actualizarProducto($id, $referencia, $descripcion, $estaVerificado, $proveedor_id_proveedor, $categoria_id_categoria, $inventario_id){
			try {
			$con = conexion::getConexion();
			$query = $con->prepare("UPDATE Producto SET referencia = :referencia, descripcion = :descripcion, is_verificado = :estaVerificado, proveedor_id_proveedor = :proveedor_id_proveedor, categoria_id_categoria = :categoria_id_categoria, inventario_id = :inventario_id where id = :id");
			$query->bindParam(":id", $id, PDO::PARAM_INT);
			$query->bindParam(":referencia", $referencia, PDO::PARAM_STR);
			$query->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
			$query->bindParam(":estaVerificado", $estaVerificado, PDO::PARAM_INT);
			$query->bindParam(":proveedor_id_proveedor", $proveedor_id_proveedor, PDO::PARAM_STR);
			$query->bindParam(":categoria_id_categoria", $categoria_id_categoria, PDO::PARAM_STR);
			$query->bindParam(":inventario_id", $inventario_id, PDO::PARAM_STR);
			
			$query->execute();

			header("location:../listarProductos.php");
			} catch (PDOException $e) {
				echo($e);
			}


		}

		function crearProducto($referencia, $descripcion, $estaVerificado, $proveedor_id_proveedor, $categoria_id_categoria, $inventario_id){
			try {
			$con = conexion::getConexion();
			$query = $con->prepare("INSERT INTO producto VALUES (null, :referencia, :descripcion, :estaVerificado, :proveedor_id_proveedor, :categoria_id_categoria, :inventario_id)");
			$query->bindParam(":referencia", $referencia, PDO::PARAM_STR);
			$query->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
			$query->bindParam(":estaVerificado", $estaVerificado, PDO::PARAM_INT);
			$query->bindParam(":proveedor_id_proveedor", $proveedor_id_proveedor, PDO::PARAM_STR);
			$query->bindParam(":categoria_id_categoria", $categoria_id_categoria, PDO::PARAM_STR);
			$query->bindParam(":inventario_id", $inventario_id, PDO::PARAM_STR);

			$query->execute();

			header("location:../listarProductos.php");
			} catch (PDOException $e) {
				echo($e);
			}



		}

		
	}
	
 ?>