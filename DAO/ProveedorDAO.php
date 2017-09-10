<?php 
	
	class ProveedorDAO{

		function listarProveedores(){
			$con = conexion::getConexion();
			$query = $con->query("SELECT * FROM proveedor")->fetchAll(PDO::FETCH_OBJ);
			
			return $query;

		}

		function actualizarProveedor($id, $nombre, $estado){
			try {
			$con = conexion::getConexion();
			$query = $con->prepare("UPDATE Proveedor SET nombre = :nombre, estado = :estado where id = :id");
			$query->bindParam(":id", $id, PDO::PARAM_INT);
			$query->bindParam(":nombre", $nombre, PDO::PARAM_STR);
			$query->bindParam(":estado", $estado, PDO::PARAM_STR);
			
			
			
			$query->execute();

			header("location:../listarProveedores.php");
			} catch (PDOException $e) {
				echo($e);
			}


		}

		function crearProveedor($nombre, $estado){
			try {
				$con = conexion::getConexion();
				$query = $con->prepare("INSERT INTO proveedor VALUES (null, :nombre, :estado)");
				$query->bindParam(":nombre", $nombre, PDO::PARAM_STR);
				$query->bindParam(":estado", $estado, PDO::PARAM_STR);

				$query->execute();

				header("location:../listarProveedores.php");
			} catch (PDOException $e) {
				echo($e);
			}

		}
		
	}
	
 ?>