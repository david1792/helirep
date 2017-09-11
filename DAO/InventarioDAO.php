<?php 
	
	class InventarioDAO{

		function listarInventarios($id){
			$con = conexion::getConexion();
			$query = $con->prepare("SELECT * FROM inventario WHERE bodega_id = :id");
			$query->bindParam(":id", $id, PDO::PARAM_INT);
			$query->execute();
			$filas = $query->fetchAll(PDO::FETCH_OBJ);
			return $filas;

		}

		function crearInventario($bodega){
			try {
			$con = conexion::getConexion();
			$query = $con->prepare("INSERT INTO inventario VALUES (null, 0, :bodega)");
			$query->bindParam(":bodega", $bodega, PDO::PARAM_STR);

			$query->execute();
			header("location:../listarBodegas.php");
			} catch (PDOException $e) {
				echo($e);
			}


		}


		
	}
	
 ?>