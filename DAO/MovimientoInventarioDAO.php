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

		function validarIdInventario(){


		}

	}
	
 ?>