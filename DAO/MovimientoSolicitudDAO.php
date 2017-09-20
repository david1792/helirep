<?php 
	/**
	* 
	*/
	class MovimientoSolicitudDAO
	{

		function listarMovimientos($id){
			$con = conexion::getConexion();
			$query = $con->prepare("SELECT * FROM movimiento_solicitud WHERE solicitud_id = :id");
			$query->bindParam(":id", $id, PDO::PARAM_INT);
			$query->execute();
			$filas = $query->fetchAll(PDO::FETCH_OBJ);
			return $filas;

		}

		function crearMovimiento($fechaActualizacion, $tipoMovimiento, $descripcion, $solicitudId){
			try {
			$con = conexion::getConexion();
			$query = $con->prepare("INSERT INTO movimiento_solicitud VALUES (null, :fechaActualizacion, :tipoMovimiento, :descripcion, :solicitudId)");
			$query->bindParam(":fechaActualizacion", $fechaActualizacion, PDO::PARAM_STR);
			$query->bindParam(":tipoMovimiento", $tipoMovimiento, PDO::PARAM_STR);
			$query->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
			$query->bindParam(":solicitudId", $solicitudId, PDO::PARAM_STR);

			$query->execute();

			//header("location:../listarProyectos.php");
			} catch (PDOException $e) {
				echo($e);

			}

		}

		function validarMovimiento($tipoMovimiento, $fechaActualizacion, $descripcion, $solicitudId){
			$con = conexion::getConexion();
			$query = $con->prepare("SELECT producto.cantidad, producto.id FROM producto INNER JOIN producto_solicitud ON producto.id = producto_solicitud.producto_id_producto INNER JOIN solicitud on solicitud.id = producto_solicitud.solicitud_id_solicitud WHERE solicitud.id = :id GROUP BY cantidad");
				$query->bindParam(":id", $solicitudId, PDO::PARAM_STR);
				$query->execute();
				$filas = $query->fetchAll(PDO::FETCH_OBJ);
				
			if(($filas[0]->cantidad > 0) && $tipoMovimiento === 'entregado'){
				$this->restarCantidadProducto($filas[0]->id);
				$this->crearMovimiento($fechaActualizacion, $tipoMovimiento, $descripcion, $solicitudId);
				print_r($filas);

			}elseif ($tipoMovimiento === 'devolucion') {
				$this->sumarCantidadProducto($filas[0]->id);
				$this->crearMovimiento($fechaActualizacion, $tipoMovimiento, $descripcion, $solicitudId);

			}

		}

		function restarCantidadProducto($id){
			try {
			$con = conexion::getConexion();
			$query = $con->prepare("UPDATE Producto SET cantidad = (cantidad - 1) where id = :id");
			$query->bindParam(":id", $id, PDO::PARAM_INT);
			$query->execute();
			echo "disminuyo";

			header("location:../listarProyectos.php");
			} catch (PDOException $e) {
				echo($e);
			}


		}

		function sumarCantidadProducto($id){
			try {
			$con = conexion::getConexion();
			$query = $con->prepare("UPDATE Producto SET cantidad = (cantidad + 1) where id = :id");
			$query->bindParam(":id", $id, PDO::PARAM_INT);
			$query->execute();
			echo "aumento";

			header("location:../listarProyectos.php");
			} catch (PDOException $e) {
				echo($e);
			}


		}




	}
	
 ?>