<?php
 
ob_start();
  include 'Archivos_class.php';
$archivo = new Archivos();
 if($_SERVER['REQUEST_METHOD'] = 'POST')
 $archivo->validacion_usuario();

  ?>

<!DOCTYPE html>
 <html lang="en">
  <head>
  <link href="css/login.css" rel="stylesheet" media="screen">
   <title>Login</title>
   <meta charset = "utf-8">
  </head>
  <body >
  <h1>Login de Usuarios</h1>

  <form action="checklogin.php" method="post" >
  <label>Nombre Usuario:</label><br>
  <input name="username" type="text" id="username" required>
  <br><br>
  <label>Password:</label><br>
  <input name="password" type="password" id="password" required>
  <br><br>
  <input type="submit" class="submit" name="Submit" value="LOGIN">
  </form>
  <footer>
    <p>Universidad Nacional de Costa Rica</p>
    &copy;2018
  </footer>
   </body>
  </html>
    
 <?php
ob_end_flush();
?>