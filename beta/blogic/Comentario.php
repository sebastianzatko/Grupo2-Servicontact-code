<?php
require_once('cdata/datacomentario.php');
class Comentario{
	public function comentar($idusuario,$idpublicacion,$comentario){
		
		$comentarios=new datacomentario();
		$data=$comentarios->comentar($idusuario,$idpublicacion,$comentario);
		return $data;
	}
	public function eliminarcomentario(){
		
	}
	
	public function obtenercomentarios($idpublicacion){
		$comentarios=new datacomentario();
		$data=$comentarios->obtenercomentarios($idpublicacion);
		return $data;
	}
}


?>