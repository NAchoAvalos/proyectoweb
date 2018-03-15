<?php session_start(); ?>
<?php
include 'Archivos_class.php';
$archivo = new Archivos();
	if(isset($_POST['username'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
//    var_dump($_SESSION);
}

if (!isset($_SESSION['loggedin']) && !$_SESSION['loggedin'] == true) {

	 @header('location:logout.php');

	}
$carpeta = 'media/'.$_SESSION['username'];
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}
	 echo "<h1> Bienvenido!" . $_SESSION['username']."</h1>";
	 echo " <a href=panel-control.php>Panel de Control</a>";
	 // echo "Username o Password estan incorrectos.";
	 //echo "<br><a href='login.html'>Volver a Intentarlo</a>";
?>
	 <!DOCTYPE html>
	<html>
	    <head>
	    	<link href="css/index.css" rel="stylesheet" media="screen">
	    </head>
	    <body >
	        <form action="#" method="post" enctype="multipart/form-data">
	        	<table>
	        	<tr>
	        	<td>
	        	<label>Nombre archivo</label>
	        	</td>
	        	<td>
	        	<input type="text" name="nombre">
	        	</td>
	        	</tr>
	        	<tr>
	        		<td>
	        	<label>Autor</label>
	        	</td>
	        	<td>
	        	<input type="text" name="autor">
	        	</td>
	        	</tr>
	        	<tr>
	        		<td>
	        	<label>Fecha</label>
	        	</td>
	        	<td>
	        	<input type="text" name="fecha">
	        	</td>
	        	</tr>
	        	<tr>
	        		<td>
	        	<label>Size</label>
	        	</td>
	        	<td>
	        	<input type="text" name="size">
	        	</td>
	        	</tr>
	        	<tr>
	        		<td>
	        	<label>Descripcion</label>
	        	</td>
	        	<td>
	        	<input type="text" name="descripcion">
	        	</td>
	        	</tr>
	        	<tr>
	        	<td>
	        	<label>Clasificacion</label>
	        	</td>
	        	<td>
	        	<input type="text" name="clasificacion">
	        	</td>
	        	</tr>
	        	<tr>
	        	<td colspan="2">
	            <input type="file"  name="archivo" id="archivo"></input>
	            <input type="submit" class = "submit" value="Subir archivo"></input>
	            </td>
	            </tr>
	            
	            </table>
	        </form>

	        <div id="global">
  <div id="mensajes"> 
  	<table>
  	  	<?php $archivo->carga_img($_SESSION['username']); 
  	//$archivo->validacion_usuario();
  	?>
  	</table>

  </div>
</div>
	    </body>
	</html>
	

	<?php
//var_dump($_FILES);
	if($_SERVER['REQUEST_METHOD'] = 'POST'){
if ($_FILES['archivo']["error"] > 0)
	  {
	  echo "Error: " . $_FILES['archivo']['error'] . " No es un archivo valido<br>";
	  }
	else
	  {
	/*  echo "Nombre: " . $_FILES['archivo']['name'] . "<br>";
	  echo "Tipo: " . $_FILES['archivo']['type'] . "<br>";
	  echo "Tamaño: " . ($_FILES["archivo"]["size"] / 1024) . " kB<br>";
	  echo "Carpeta temporal: " . $_FILES['archivo']['tmp_name'];*/
	 
	  /*ahora co la funcion move_uploaded_file lo guardaremos en el destino que queramos*/
	move_uploaded_file($_FILES['archivo']['tmp_name'],
	"media/" . $_SESSION['username'].'/'. $_FILES['archivo']['name']);
	$archivo->URLS_img("media/" . $_SESSION['username'].'/'. $_FILES['archivo']['name']);

	//<em id="__mceDel"> </em>
}
//$_SERVER['REQUEST_METHOD'] = null;
}

?>
