<?php
include_once('cdata/datapuntuar.php');

class Puntuar{
	public function puntuarusuario($idusuario,$puntuacion){
		$p = new datapuntuar();
		$res = $p->dpuntuarusuario($idusuario,$puntuacion);
		return $res;
	}

	public function puntuarprofesion($idprof,$idservicio,$puntuacion){
		$p = new datapuntuar();
		$res = $p->dpuntuarprofesion($idprof,$idservicio,$puntuacion);
		return $res;
	}

	public function puntuacionestrellas($id,$tipo,$estrellas){
		$p = new datapuntuar();
		$res = $p->puntuacionestrellas($id,$tipo,$estrellas);
		return $res;
	}
}
?>
