<?php 
	/**
	* 
	*/
	class SolicitudDAO
	{

		function listarSolicitudes(){
			$con = conexion::getConexion();
			$query = $con->query("SELECT * FROM solicitud")->fetchAll(PDO::FETCH_OBJ);
			return $query;

		}

		function listarSolicitudesPorPedido($id){
			$con = conexion::getConexion();
			$query = $con->prepare("SELECT movimiento_solicitud.tipo_movimiento, solicitud.descripcion, producto.descripcion
from movimiento_solicitud inner join solicitud on solicitud.id = movimiento_solicitud.solicitud_id
inner join producto_solicitud on solicitud.id = producto_solicitud.solicitud_id_solicitud
inner join producto on producto.id = producto_solicitud.producto_id_producto
 where solicitud.id = :id");
			$query->bindParam(":id", $id, PDO::PARAM_INT);
			$query->execute();
			$filas = $query->fetchAll(PDO::FETCH_OBJ);
			
			return $filas;

		}

		function listarSolicitudesPorProyecto($id){
			$con = conexion::getConexion();
			$query = $con->prepare("SELECT * FROM solicitud WHERE proyecto_id = :id");
			$query->bindParam(":id", $id, PDO::PARAM_INT);
			$query->execute();
			$filas = $query->fetchAll(PDO::FETCH_OBJ);
			
			return $filas;

		}

		function listarUltumaSolicitudInsertada($id){
			$con = conexion::getConexion();
			$query = $con->prepare("SELECT max(id) as proyecto_id FROM solicitud WHERE proyecto_id = :id");
			$query->bindParam(":id", $id, PDO::PARAM_INT);
			$query->execute();
			$filas = $query->fetchAll(PDO::FETCH_OBJ);
			
			return $filas;

		}		

		function crearSolicitud($descripcion, $fechaSolicitud, $proyecto_id){
			try {
			$con = conexion::getConexion();
			$query = $con->prepare("INSERT INTO solicitud VALUES (null, :descripcion, :fechaSolicitud, :proyecto_id)");
			$query->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
			$query->bindParam(":fechaSolicitud", $fechaSolicitud, PDO::PARAM_STR);
			$query->bindParam(":proyecto_id", $proyecto_id, PDO::PARAM_STR);

			$query->execute();

			} catch (PDOException $e) {
				echo($e);

			}

		}

	}
	
 ?>