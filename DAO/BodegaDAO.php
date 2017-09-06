<?php 
	
	class BodegaDAO{
		
		function validarUsuario($documento, $contrasena){
			$con = conexion::getConexion();
			$query = $con->prepare("SELECT * FROM usuario WHERE documento = :documento AND contrasena = :contrasena");
			$query->bindParam(":documento", $documento, PDO::PARAM_INT);
			$query->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);
			$query->execute();
			$total = $query->rowCount();
			if($total == 1){
				echo " existe";
				session_start();
				$usuario = $query->fetch();
				$_SESSION =  $usuario;
				
				if($usuario['rol'] == 1){
					header('location:../inicioJefeTaller.php');

				}elseif ($usuario['rol'] == 2) {
					header('location:../inicioAlmacenista.php');

				}

			}else{
				echo "no existe";
				header('location:../index.php');
				
			}
			
		}

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