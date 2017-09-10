<?php 
	
	class UsuarioDAO{
		
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

		function listarUsuarios(){
			$con = conexion::getConexion();
			$query = $con->query("SELECT * FROM usuario")->fetchAll(PDO::FETCH_OBJ);
			
			return $query;

		}

		function actualizarUsuario($id, $nombre, $apellido, $contrasena, $documento, $estado, $rol){
			try {
			$con = conexion::getConexion();
			$query = $con->prepare("UPDATE usuario SET nombre = :nombre, apellido = :apellido, contrasena = :contrasena, documento = :documento, estado = :estado, rol = :rol where id = :id");
			$query->bindParam(":id", $id, PDO::PARAM_INT);
			$query->bindParam(":nombre", $nombre, PDO::PARAM_STR);
			$query->bindParam(":apellido", $apellido, PDO::PARAM_STR);
			$query->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);
			$query->bindParam(":documento", $documento, PDO::PARAM_STR);
			$query->bindParam(":estado", $estado, PDO::PARAM_STR);
			$query->bindParam(":rol", $rol, PDO::PARAM_STR);
			$query->execute();

			header("location:../listarUsuarios.php");
			} catch (PDOException $e) {
				echo($e);
			}


		}

		function crearUsuario($nombre, $apellido, $contrasena, $documento, $estado, $rol){
			try {
			$con = conexion::getConexion();
			$query = $con->prepare("INSERT INTO usuario VALUES (null, :nombre, :apellido,  :contrasena, :documento, :estado, :rol)");
			$query->bindParam(":nombre", $nombre, PDO::PARAM_STR);
			$query->bindParam(":apellido", $apellido, PDO::PARAM_STR);
			$query->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);
			$query->bindParam(":documento", $documento, PDO::PARAM_STR);
			$query->bindParam(":estado", $estado, PDO::PARAM_STR);
			$query->bindParam(":rol", $rol, PDO::PARAM_STR);
			$query->execute();

			header("location:../listarUsuarios.php");
			} catch (PDOException $e) {
				echo($e);
			}

		}

	}
	
 ?>