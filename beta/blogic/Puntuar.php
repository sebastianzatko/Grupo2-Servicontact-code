<?php
require_once('cdata/datapuntuar.php');
class Puntuar{
	public function puntuarusuario($idusuario,$puntuacion){
		$puntuaction=new datapuntuar();
		$data=$puntuacion->puntuarusuario($idusuario,$puntuacion);
		return $data;
	}
	public function puntuarprofesion($idoficio,$puntuacion){
		$puntuaction=new datapuntuar();
		$data=$puntuacion->puntuarprofesion($idoficio,$puntuacion);
		return $data;
	}
}



?>