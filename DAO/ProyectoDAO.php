<?php 
	/**
	* 
	*/
	class ProyectoDAO
	{

		function listarProyectos(){
			$con = conexion::getConexion();
			$query = $con->query("SELECT * FROM proyecto")->fetchAll(PDO::FETCH_OBJ);
			
			return $query;

		}	

		function actualizarProyecto($id, $descripcion, $fechaInicio, $fechaFin){
			try {
			$con = conexion::getConexion();
			$query = $con->prepare("UPDATE proyecto SET descripcion = :descripcion, fecha_inicio = :fechaInicio, fecha_fin = :fechaFin where id = :id");

			$query->bindParam(":id", $id, PDO::PARAM_INT);
			$query->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
			$query->bindParam(":fechaInicio", $fechaInicio, PDO::PARAM_STR);
			$query->bindParam(":fechaFin", $fechaFin, PDO::PARAM_STR);
			$query->execute();

			header("location:../listarProyectos.php");
			} catch (PDOException $e) {
				echo($e);
			}


		}

		function crearProyecto($descripcion, $fechaInicio, $fechaFin, $usuario_id, $bodega_id){
			try {
			$con = conexion::getConexion();
			$query = $con->prepare("INSERT INTO proyecto VALUES (null, :descripcion, :fechaInicio,  :fechaFin, :usuario_id, :$bodega_id)");
			$query->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
			$query->bindParam(":fechaInicio", $fechaInicio, PDO::PARAM_STR);
			$query->bindParam(":fechaFin", $fechaFin, PDO::PARAM_STR);
			$query->bindParam(":usuario_id", $usuario_id, PDO::PARAM_STR);
			$query->bindParam(":$bodega_id", $bodega_id, PDO::PARAM_STR);

			$query->execute();

			header("location:../listarProyectos.php");
			} catch (PDOException $e) {
				echo($e);
			}

		}

	}
	
 ?>