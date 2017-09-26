<?php 
	/**
	* 
	*/
	
	class MovimientoInventarioDAO
	{

		function listarMovimientos($id){
			$con = conexion::getConexion();
			$query = $con->prepare("SELECT * FROM movimiento_inventario WHERE inventario_id = :id");
			$query->bindParam(":id", $id, PDO::PARAM_INT);
			$query->execute();
			$filas = $query->fetchAll(PDO::FETCH_OBJ);
			return $filas;

		}

		function crearMovimientoPrimeraVez($bodegaInventarioId){
			try {
			$con = conexion::getConexion();
			$query = $con->prepare("INSERT INTO movimiento_inventario VALUES (null,  NOW(), 'entrada', 'primer ingreso', :bodegaInventarioId)");
			$query->bindParam(":bodegaInventarioId", $bodegaInventarioId, PDO::PARAM_STR);

			$query->execute();

			//header("location:../listarBodegas.php");
			} catch (PDOException $e) {
				echo($e);

			}

		}

		function crearMovimiento($idBodega, $tipoMovimiento, $descripcion, $mov_producto){
			echo "entro a crearMovimiento<br>";
			try {
				if($tipoMovimiento === 'entregado'){
					$tipoMovimiento = 'salida';
					echo "salida<br>";

				}else{
					$tipoMovimiento = 'entrada';
					echo "entrada<br>";

				}

				$con = conexion::getConexion();
				$query = $con->prepare("INSERT INTO movimiento_inventario VALUES (null,  NOW(), :tipoMovimiento, :descripcion, :bodegaInventarioId, :mov_producto)");
				$query->bindParam(":bodegaInventarioId", $idBodega, PDO::PARAM_STR);
				$query->bindParam(":tipoMovimiento", $tipoMovimiento, PDO::PARAM_STR);
				$query->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
				$query->bindParam(":mov_producto", $mov_producto, PDO::PARAM_STR);
				$query->execute();
				echo "salio de crearMovimiento<br>";

			} catch (PDOException $e) {
				echo($e);

			}

		}

	}
	
 ?>