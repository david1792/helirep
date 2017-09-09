<?php 
	
	class CategoriaDAO{

		function listarCategorias(){
			$con = conexion::getConexion();
			$query = $con->query("SELECT * FROM categoria")->fetchAll(PDO::FETCH_OBJ);
			
			return $query;

		}

		function actualizarCategoria($id, $descripcion){
			try {
			$con = conexion::getConexion();
			$query = $con->prepare("UPDATE Categoria SET descripcion = :descripcion where id = :id");
			$query->bindParam(":id", $id, PDO::PARAM_INT);
			$query->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
			
			
			
			$query->execute();

			header("location:../listarCategorias.php");
			} catch (PDOException $e) {
				echo($e);
			}


		}


		
	}
	
 ?>