 <?php
ob_start();
@session_start();
include 'Archivos_class.php';
$archivo = new Archivos();
//var_dump($_SESSION["session_username"]);
if(!isset($_SESSION["session_username"]) || empty($_SESSION["session_username"])) {
 header("location:login.php");
} else {var_dump($_SESSION['session_username']);
}
?>

<!DOCTYPE html>
	<html>
	    <head>
	    </head>
	    <body>
	        <form action="#" method="post" enctype="multipart/form-data">
	            <input type="file" name="archivo" id="archivo"></input>
	            <input type="submit" value="Subir archivo"></input>
	        </form>
	    </body>
	</html>
	<style type="text/css">
#global {
	height: 100%px;
	width: 100%;
	border: 1px solid #ddd;
	background: #f1f1f1;
	overflow-y: scroll;
}
#mensajes {
	height: auto;
}
.texto {
	padding:4px;
	background:#fff;
}
.div-imagen {
  display:inline-block;
  position:relative;
}

.div-imagen > div {
  position:absolute;
  top:0;
  left:0;
  z-index:-1;
  padding:10px;
  margin:0;
}

.desvanecer:hover {
  opacity: 0.07;
  -webkit-transition: opacity 500ms;
  -moz-transition: opacity 500ms;
  -o-transition: opacity 500ms;
  -ms-transition: opacity 500ms;
  transition: opacity 500ms;
}
</style>
<div id="global">
  <div id="mensajes"> 
  	<?php $archivo->carga_img(); ?>
  </div>
</div>
	<?php
//var_dump($_FILES);
if ($_FILES['archivo']["error"] > 0)
	  {
	 // echo "Error: " . $_FILES['archivo']['error'] . "<br>";
	  }
	else
	  {
	/*  echo "Nombre: " . $_FILES['archivo']['name'] . "<br>";
	  echo "Tipo: " . $_FILES['archivo']['type'] . "<br>";
	  echo "Tamaño: " . ($_FILES["archivo"]["size"] / 1024) . " kB<br>";
	  echo "Carpeta temporal: " . $_FILES['archivo']['tmp_name'];*/
	 
	  /*ahora co la funcion move_uploaded_file lo guardaremos en el destino que queramos*/
	move_uploaded_file($_FILES['archivo']['tmp_name'],
	"subidas/" . $_FILES['archivo']['name']);
$archivo->URLS_img("subidas/" . $_FILES['archivo']['name']);

	//<em id="__mceDel"> </em>
}
	?>

	<?php
ob_end_flush();
?>