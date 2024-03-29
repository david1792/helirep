<?php 
	
	class InventarioDAO{

		function listarMovimientosDeEntradaYSalida($productoReporte1, $fechaInventarioDesde, $fechaInventarioHasta, $tipo_producto){
			$con = conexion::getConexion();
			$query = $con->prepare("SELECT inventario.id, movimiento_inventario.tipo_movimiento 
from inventario inner join movimiento_inventario on inventario.id = movimiento_inventario.inventario_id
where fecha_actualizacion between :fechaInventarioDesde and :fechaInventarioHasta and movimiento_inventario.mov_producto = :tipo_producto");

			$query->bindParam(":fechaInventarioDesde", $fechaInventarioDesde, PDO::PARAM_STR);
			$query->bindParam(":fechaInventarioHasta", $fechaInventarioHasta, PDO::PARAM_STR);
			$query->bindParam(":tipo_producto", $tipo_producto, PDO::PARAM_INT);
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