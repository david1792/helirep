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
				echo "entro a movimiento";
				$con = conexion::getConexion();
				$query = $con->prepare("INSERT INTO movimiento_solicitud VALUES (null, :fechaActualizacion, :tipoMovimiento, :descripcion, :solicitudId)");
				$query->bindParam(":fechaActualizacion", $fechaActualizacion, PDO::PARAM_STR);
				$query->bindParam(":tipoMovimiento", $tipoMovimiento, PDO::PARAM_STR);
				$query->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
				$query->bindParam(":solicitudId", $solicitudId, PDO::PARAM_STR);

				$query->execute();

			} catch (PDOException $e) {
				echo($e);

			}

		}

		function validarMovimiento($tipoMovimiento, $fechaActualizacion, $descripcion, $solicitudId){
			$con = conexion::getConexion();
			$query = $con->prepare("SELECT producto.cantidad, producto.id FROM producto INNER JOIN producto_solicitud ON producto.id = producto_solicitud.producto_id_producto INNER JOIN solicitud on solicitud.id = producto_solicitud.solicitud_id_solicitud WHERE solicitud.id = :id GROUP BY cantidad");
			$query->bindParam(":id", $solicitudId, PDO::PARAM_STR);
			$query->execute();
			$filas = $query->fetchAll();
			print_r($query);
			print_r($filas);
			echo "<br>";
			foreach ($filas as $f) {
				echo $f['cantidad'];

				if(($f['cantidad'] > 0) && $tipoMovimiento === 'entregado'){
					echo "entro a entregado";
					$this->restarCantidadProducto($filas[0]->id);
					$this->crearMovimiento($fechaActualizacion, $tipoMovimiento, $descripcion, $solicitudId);
					

				}elseif ($tipoMovimiento === 'devolucion') {
					echo "entro a devolucion";
					$this->sumarCantidadProducto($filas[0]->id);
					$this->crearMovimiento($fechaActualizacion, $tipoMovimiento, $descripcion, $solicitudId);

				}elseif ($f == null){
					echo "no existe stock para ese producto";

				}
				
			}

		}

		function restarCantidadProducto($id){
			try {
			$con = conexion::getConexion();
			$query = $con->prepare("UPDATE Producto SET cantidad = (cantidad - 1) where id = :id");
			$query->bindParam(":id", $id, PDO::PARAM_INT);
			$query->execute();
			echo "disminuyo";

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

			} catch (PDOException $e) {
				echo($e);
			}


		}




	}
	
 ?>