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

		function movimientosProductosAsignadosAPedidos($idSolicitud){
			$con = conexion::getConexion();
			$query = $con->prepare("SELECT movimiento_solicitud.tipo_movimiento, solicitud.descripcion, producto.referencia from movimiento_solicitud inner join solicitud on solicitud.id = movimiento_solicitud.solicitud_id inner join producto_solicitud on solicitud.id = producto_solicitud.solicitud_id_solicitud inner join producto on producto.id = producto_solicitud.producto_id_producto where solicitud.id = :idSolicitud");
			$query->bindParam(":idSolicitud", $idSolicitud, PDO::PARAM_INT);
			$query->execute();
			$filas = $query->fetchAll(PDO::FETCH_OBJ);
			return $filas;

		}		

		function  movimientosConsolidadosEntreInventarioYPedidos ($idSolicitud, $idProducto, $fechaMovimientoDesde, $fechaMovimientoHasta){
			$con = conexion::getConexion();
			$query = $con->prepare("SELECT movimiento_solicitud.tipo_movimiento, solicitud.descripcion, producto.referencia from movimiento_solicitud inner join solicitud on solicitud.id = movimiento_solicitud.solicitud_id inner join producto_solicitud on solicitud.id = producto_solicitud.solicitud_id_solicitud inner join producto on producto.id = producto_solicitud.producto_id_producto where fecha_actualizacion between :fechaMovimientoDesde and :fechaMovimientoHasta and producto.id = :idProducto and solicitud.id = :idSolicitud");

			$query->bindParam(":fechaMovimientoDesde", $fechaMovimientoDesde, PDO::PARAM_STR);
			$query->bindParam(":fechaMovimientoHasta", $fechaMovimientoHasta, PDO::PARAM_STR);
			$query->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
			$query->bindParam(":idSolicitud", $idSolicitud, PDO::PARAM_INT);
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
			echo "<br>";
			echo "<br>";
			print_r($filas);
			echo "<br>";
			echo "<br>";
			$bandera = false;
			foreach ($filas as $f) {
				echo $f['cantidad']."<br>";

				if($tipoMovimiento === 'entregado'){

					if($f['cantidad'] > 0 ){
						echo "entro a entregado"."<br>";
						$this->restarCantidadProducto($f['id']);
						$this->crearMovimiento($fechaActualizacion, $tipoMovimiento, $descripcion, $solicitudId);
						$bandera = true;

					}

					if($f['cantidad'] <= 0){
						echo "no existe stock para ese producto, por favor ingrese mas existencias"."<br>";

					}
					return $bandera;

				}elseif ( $tipoMovimiento === 'devolucion') {
					echo "entro a devolucion"."<br>";
					$this->sumarCantidadProducto($f['id']);
					$this->crearMovimiento($fechaActualizacion, $tipoMovimiento, $descripcion, $solicitudId);
					$bandera = true;

					return $bandera;

				}
				
			}

		}

		function restarCantidadProducto($id){
			try {
			$con = conexion::getConexion();
			$query = $con->prepare("UPDATE Producto SET cantidad = (cantidad - 1) where id = :id");
			$query->bindParam(":id", $id, PDO::PARAM_INT);
			$query->execute();
			echo "disminuyo"."<br>";

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
			echo "aumento"."<br>";

			} catch (PDOException $e) {
				echo($e);
			}


		}




	}
	
 ?>