<?php 
	/**
	* 
	*/
	class ProductoSolicitud{


		function crearProductoSolicitud($solicitud_id_solicitud, $producto_id_producto){
			try {
			$con = conexion::getConexion();
			$query = $con->prepare("INSERT INTO producto_solicitud VALUES (null, :solicitud_id_solicitud, :producto_id_producto)");
			$query->bindParam(":solicitud_id_solicitud", $solicitud_id_solicitud, PDO::PARAM_STR);
			$query->bindParam(":producto_id_producto", $producto_id_producto, PDO::PARAM_STR);
			$query->execute();

			} catch (PDOException $e) {
				echo($e);

			}

		}		
	}

 ?>