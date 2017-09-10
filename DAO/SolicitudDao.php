<?php 
	/**
	* 
	*/
	class SolicitudDAO
	{

		function listarSolicitudes($id){
			$con = conexion::getConexion();
			$query = $con->prepare("SELECT * FROM solicitud WHERE proyecto_id = :id");
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

			header("location:../listarProyectos.php");
			} catch (PDOException $e) {
				echo($e);

			}

		}

	}
	
 ?>