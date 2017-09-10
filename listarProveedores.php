
<?php 
	session_start();
	require('DAO/ProveedorDAO.php');
	require('util/Conexion.php');

	if(isset($_SESSION['rol']) || $_SESSION['rol'] === 1){
		$proveedorDAO = new ProveedorDAO();
		$listarProveedores = $proveedorDAO->listarProveedores();

 ?>

 <!DOCTYPE html>
 <html>
	 <head>
	 	<?php include("template/template.php"); ?>
	 	<title>Inicio jefe de taller</title>
	 </head>
	 <body>

 	<table  border="1" cellspacing="5" >
	 		<thead>
	 			
	 				<th>id</th>
	 				<th>nombre</th>
	 				<th>estado</th>
	 				<th>opciones</th>
	 				
	 		</thead>
	 		<tbody>
	 			<?php foreach ($listarProveedores as $proveedor): ?>
	 				<tr>
	 					<th><?php echo $proveedor->id; ?></th>
	 					<th><?php echo $proveedor->nombre; ?></th>
	 					<th><?php echo $proveedor->estado; ?></th>
	 					
	 					<th><a href="editarProveedor.php?idProveedor=<?php echo $proveedor->id ?>">editar</a></th>

	 				</tr>
	 			<?php endforeach ?>

	 		</tbody>
	 	</table>

	 	<br>
	 	<a class="button" href="crearProveedor.php">ingresar proveedor</a>

	 </body>
 </html>

<?php 
	}else{

?>

 <!DOCTYPE html>
 <html>
	 <head>
	 	<?php include("template/template.php"); ?>
	 	<title>Inicio jefe de taller</title>
	 </head>
	 <body>
	 	<h1>Por favor inicie sesion, sera redirigido en 2 segundos</h1>
	 	<?php 
	 		print_r($_SESSION);
	 	 ?>
	 	<script>
            setTimeout("location.href = 'controllers/Logout.php';", 4000);
        </script>
	 </body>
 </html>

<?php 
		}

?>