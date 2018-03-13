<?php
class Archivos{


// Guarda registro de usuarios
public function registro($data){
 //var_dump('entramos');
	if(isset($_POST['sign_up'])){ 
		$handle = fopen('users.txt', "a");
		$numbytes = fwrite($handle, str_pad($data['full_name'].'/'.$data['email'].'/'.$data['username'].'/'.$data['password'].'/'.$data['password'], 100)); fclose($handle);
		header("location:login.php");
		}
	

}
public function URLS_img($data){
 //var_dump('entramos');
	//if(isset($_POST['sign_up'])){ 
		$handle = fopen('urls_img.txt', "a");
		$numbytes = fwrite($handle, str_pad($_POST['nombre'].'&'.$_POST['autor'].'&'.$_POST['fecha'].'&'.$_POST['size'].'&'.$_POST['descripcion'].'&'.$_POST['clasificacion'].'&'.$data, 200)); fclose($handle);
		@header("location:checklogin.php");
		//}

	
	//$_SERVER['REQUEST_METHOD'] = null;

	}


	public function carga_img(){

	$fp = fopen('urls_img.txt', 'r');
	$cont =0;
	while(!feof($fp)){
		fseek($fp, $cont*200);
		$datos = fread($fp, 200);
		$datos = trim($datos);
		$datos_extraidos = explode("&", $datos);
		if(substr($datos_extraidos[6], -4)==='.jpg'){

		echo '<tr>
		<td>
		<p>Nombre: '.$datos_extraidos[0].'</p>
		<p>Autor: '.$datos_extraidos[1].'</p>
		<p>Fecha: '.$datos_extraidos[2].'</p>
		<p>Size: '.$datos_extraidos[3].'</p>
		<p>Descripcion: '.$datos_extraidos[4].'</p>
		<p>Clasificacion: '.$datos_extraidos[5].'</p>
		</td>

		<td>
		<img src='.$datos_extraidos[6].' alt="Smiley face" height="300" width="300">
		<td>
		</tr>'; }
		//$datos = str_replace("/", " ", $datos);
		/*if($datos!=''){
			$this->agregar_registro($datos);
			$cont++;
			}*/
			$cont++;
}
	}

	public function validacion_usuario(){
		if(isset($_POST['Submit'])){
	$fp = fopen('users.txt', 'r');
	$cont =0;
	while(!feof($fp)){
		fseek($fp, $cont*100);
		$datos = fread($fp, 100);
		$datos_extraidos = explode("/", $datos);
		//var_dump($datos_extraidos);
		if($datos_extraidos[2] === $_POST['username'] && $datos_extraidos[3] === $_POST['password'] ){
			//var_dump("entrando");
			header("location:checklogin.php");
			exit;
		}
		//$datos = str_replace("/", " ", $datos);
		/*if($datos!=''){
			$this->agregar_registro($datos);
			$cont++;
			}*/
			$cont++;
}}
$_SERVER['REQUEST_METHOD'] = null;
//var_dump('no entramos');
//@header("location:login.php");
	}



}
?>