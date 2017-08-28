<?php 
	
	/**
	* 
	*/
	class UsuarioDAO 
	{
		
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

			}else{
				echo " no existe";
				header('location:../index.php');
			}

		}	
		
	}

 ?>