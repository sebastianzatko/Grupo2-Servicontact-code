<?php
include_once('cdata/datapuntuar.php');

class Puntuar{
	public function puntuarusuario($idusuario,$puntuacion){
		$puntuacion=new datapuntuar();
		$res=$puntuacion->dpuntuarusuario($idusuario,$puntuacion);
		return $res;
	}
	public function puntuarprofesion($idprof,$idservicio,$puntuacion){
		$p = new datapuntuar();
		$res = $p->dpuntuarprofesion($idprof,$idservicio,$puntuacion);
		return $res;
	}
}
?>
