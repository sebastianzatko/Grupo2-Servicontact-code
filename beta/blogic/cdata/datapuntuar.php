<?php
include_once('conexion/conectionpdo.php');

class datapuntuar{
	public function dpuntuarusuario($idusuario,$puntuacion){
		$con = new Conexion();
		$query = $con->prepare("UPDATE USUARIOS SET PUNTUACIÓN=(PUNTUACIÓN+:p) , CANTIDADDEPUNTUACIONES=(CANTIDADDEPUNTUACIONES+'1') WHERE idUSUARIO=:id");
		$query->bindParam(':p',$puntuacion);
		$query->bindParam(':id', $idusuario);
		if($query->execute()){
			return true;
		}else{
			//print_r($query->errorInfo());
			return false;
		}
	}
	public function dpuntuarprofesion($idprof,$idservicio,$puntuacion){
		$con = new Conexion();
		$query = $con->prepare("UPDATE `OFICIOS` SET `PUNTUACIÓN`=`PUNTUACIÓN`+?,`CANTIDAD_DE_PUNTUACIONES`=`CANTIDAD_DE_PUNTUACIONES`+1 WHERE `PROFESIONAL_idPROFESIONAL`=? AND `SERVICIOS_idSERVICIO`=?");
		if ($query->execute(array($puntuacion,$idprof,$idservicio))){
			return true;
		}else{
			return false;
		}
	}
}
//$p = new datapuntuar();
//$res = $p->dpuntuarprofesion(16,6,5);
//echo json_encode($res);
?>
