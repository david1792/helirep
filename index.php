
 <!DOCTYPE html>
 <html>
 <head>
 <?php include("template/template.php"); ?>
     <title></title>
 </head>
 <body>

        <div class="page-container">
            <h1>Ingresar</h1>
            <form action="controllers/Login.php" method="post">
                <input type="text" name="usuario" class="username" placeholder="Usuario">
                <input type="password" name="password" class="password" placeholder="Contraseña">
                <input type="hidden" name="login">
                <button type="submit">iniciar sesion</button>
                <div class="error"><span>+</span></div>
            </form>
        </div>

 </body>
 </html>