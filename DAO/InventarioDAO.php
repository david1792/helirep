<?php 
	
	class InventarioDAO{

		function listarMovimientosDeEntradaYSalida($productoReporte1, $fechaInventarioDesde, $fechaInventarioHasta){
			$con = conexion::getConexion();
			$query = $con->prepare("SELECT movimiento_inventario.tipo_movimiento, bodega.nombre, producto.referencia from movimiento_inventario inner join inventario on inventario.id = movimiento_inventario.inventario_id inner join bodega on inventario.bodega_id = bodega.id inner join producto on producto.inventario_id = inventario.id where fecha_actualizacion between :fechaInventarioDesde and :fechaInventarioHasta and producto.id = :id");
			$query->bindParam(":fechaInventarioDesde", $fechaInventarioDesde, PDO::PARAM_STR);
			$query->bindParam(":fechaInventarioHasta", $fechaInventarioHasta, PDO::PARAM_STR);
			$query->bindParam(":id", $productoReporte1, PDO::PARAM_INT);
			$query->execute();
			$filas = $query->fetchAll(PDO::FETCH_OBJ);
			return $filas;

		}

		function listarTodosLosInventario(){
			$con = conexion::getConexion();
			$query = $con->prepare("SELECT * FROM inventario");
			$query->execute();
			$filas = $query->fetchAll(PDO::FETCH_OBJ);
			return $filas;

		}

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

		function contarProductosInventario($id){
			try {
			$con = conexion::getConexion();
			$query = $con->query("SELECT count(*) AS contador FROM producto WHERE inventario_id = '$id'")->fetch();

			$cantidad = $query['contador'];

			echo($cantidad);
			$query2 = $con->prepare("UPDATE inventario SET cantidad = :cantidad where id = :id");
			print_r($query2);
			$query2->bindParam(":cantidad", $cantidad, PDO::PARAM_STR);
			$query2->bindParam(":id", $id, PDO::PARAM_STR);
			$query2->execute();

			return $query;
			} catch (PDOException $e) {
				echo($e);
			}


		}
		
	}
	
 ?>