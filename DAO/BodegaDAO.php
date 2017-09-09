<?php 
	
	class BodegaDAO{

		function listarBodegas(){
			$con = conexion::getConexion();
			$query = $con->query("SELECT * FROM bodega")->fetchAll(PDO::FETCH_OBJ);
			
			return $query;

		}

		function actualizarBodega($id, $direccion, $nombre, $estado, $usuario_id){
			try {
			$con = conexion::getConexion();
			$query = $con->prepare("UPDATE Bodega SET direccion = :direccion, nombre = :nombre, estado = :estado, usuario_id = :usuario_id where id = :id");
			$query->bindParam(":id", $id, PDO::PARAM_INT);
			$query->bindParam(":direccion", $direccion, PDO::PARAM_STR);
			$query->bindParam(":nombre", $nombre, PDO::PARAM_STR);
			$query->bindParam(":estado", $estado, PDO::PARAM_STR);
			$query->bindParam(":usuario_id", $usuario_id, PDO::PARAM_STR);
			
			
			$query->execute();

			header("location:../listarBodegas.php");
			} catch (PDOException $e) {
				echo($e);
			}


		}


		
	}
	
 ?>