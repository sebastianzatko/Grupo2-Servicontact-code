<?php
include_once('cdata/datagalery.php');
define('__ROOT1__', dirname(dirname(__FILE__)));  
define('__DIRECTORIO__', 'https://beta.changero.online');
class Galery{
	public function obtenerfotos($id_usuario){
		$galeria = new datagalery();
		$resultado=$galeria->obtenerfotos((int)$id_usuario);
		return $resultado;
	}
	
		
	public function subirfoto($foto,$idprofesional,$tipo,$email,$tmpFilePath){
		
	
		
		$ruta=$_SERVER['DOCUMENT_ROOT'].'/files/user/'.$email."/";
		$rutadb=__DIRECTORIO__.'/files/user/'.$email."/";
		mkdir($ruta,0777,true);
		$archivo=$ruta.$foto;
		@move_uploaded_file($tmpFilePath,$archivo);
		$galeria = new datagalery();
		$resultado=$galeria->subirfoto($archivo,(int)$idprofesional,$tipo);
		return $resultado;
	}
}

?>