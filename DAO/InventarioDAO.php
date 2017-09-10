<?php 
	
	class InventarioDAO{

		function listarInventarios(){
			$con = conexion::getConexion();
			$query = $con->query("SELECT * FROM inventario")->fetchAll(PDO::FETCH_OBJ);
			
			return $query;

		}

		//implementar para inventario por favor
		function actualizarInventario($id, $nombre, $estado){
			try {
			$con = conexion::getConexion();
			$query = $con->prepare("UPDATE Proveedor SET nombre = :nombre, estado = :estado where id = :id");
			$query->bindParam(":id", $id, PDO::PARAM_INT);
			$query->bindParam(":nombre", $nombre, PDO::PARAM_STR);
			$query->bindParam(":estado", $estado, PDO::PARAM_STR);

			$query->execute();

			header("location:../listarInventario.php");
			} catch (PDOException $e) {
				echo($e);
			}


		}


		
	}
	
 ?>