
 <!DOCTYPE html>
 <html>
 <head>
 <?php include("template/template.php"); ?>
     <title></title>
 </head>
 <body>

        <div class="page-container">
            <h1>Ingresar</h1>
            <form action="Controllers/Login.php" method="post">
                <input type="text" name="documento" class="username" placeholder="Documento">
                <input type="password" name="contrasena" class="password" placeholder="Contraseña">
                <input type="hidden" name="login">
                <button type="submit">iniciar sesion</button>
                <div class="error"><span>+</span></div>

            </form>
        </div>

 </body>
 </html>