<!DOCTYPE html>
<html lang="en" class="no-js">

    <head>

        <meta charset="utf-8">
        <title>Ingresar al sistema</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/supersized.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>
    
        <h1>Bienvenido: <?php echo $_SESSION['nombre']. " ". $_SESSION['apellido']?></h1>
        <a href="controllers/Logout.php">Cerrar Sesión</a><br><br><br>

        <a href="listarUsuarios.php" class="button">Listar usuarios</a>
        <a href="listarProductos.php" class="button">Listar productos</a>
        <a href="listarBodegas.php" class="button">Listar Bodegas</a>
        <a href="listarProveedores.php" class="button">Listar proveedores</a>
        <a href="listarCategorias.php" class="button">Listar categorias</a>
        <br><br><br>
    </body>
    <footer>
        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/js/supersized.3.2.7.min.js"></script>
        <script src="assets/js/supersized-init.js"></script>
        <script src="assets/js/scripts.js"></script>
        
    </footer>

</html>

