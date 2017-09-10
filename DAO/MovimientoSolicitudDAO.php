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

			header("location:../listarProyectos.php");
			} catch (PDOException $e) {
				echo($e);

			}

		}

	}
	
 ?>