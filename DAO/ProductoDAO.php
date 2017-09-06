<?php 
	
	class ProductoDAO{
		
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

		function listarProductos(){
			$con = conexion::getConexion();
			$query = $con->query("SELECT * FROM Producto")->fetchAll(PDO::FETCH_OBJ);
			
			return $query;

		}

		function actualizarProducto($id, $referencia, $descripcion, $proveedor_id_proveedor, $categoria_id_categoria, $inventario_id){
			try {
			$con = conexion::getConexion();
			$query = $con->prepare("UPDATE Producto SET referencia = :referencia, descripcion = :descripcion, proveedor_id_proveedor = :proveedor_id_proveedor, categoria_id_categoria = :categoria_id_categoria, inventario_id = :inventario_id where id = :id");
			$query->bindParam(":id", $id, PDO::PARAM_INT);
			$query->bindParam(":referencia", $referencia, PDO::PARAM_STR);
			$query->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
			$query->bindParam(":proveedor_id_proveedor", $proveedor_id_proveedor, PDO::PARAM_STR);
			$query->bindParam(":categoria_id_categoria", $categoria_id_categoria, PDO::PARAM_STR);
			$query->bindParam(":inventario_id", $inventario_id, PDO::PARAM_STR);
			
			$query->execute();

			header("location:../listarProductos.php");
			} catch (PDOException $e) {
				echo($e);
			}


		}


		
	}
	
 ?>