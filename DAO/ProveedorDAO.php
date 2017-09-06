<?php 
	
	class ProveedorDAO{
		
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


		
	}
	
 ?>