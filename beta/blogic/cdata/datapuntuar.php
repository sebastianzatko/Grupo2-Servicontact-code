<?php
require_once('conexion/conectionpdo.php');
class datapuntuar{
	public function puntuarusuario($idusuario,$puntuacion){
		$sql="UPDATE USUARIOS SET PUNTUACION=PUNTUACION+? , CANTIDADDEPUNTUACIONES=CANTIDAD_DE_PUNTUACIONES+1 WHERE idUSUARIO=?";
		$query=$con->prepare($sql);
		if($query->execute(array($puntuacion,$idusuario))){
			return true;
		}else{
			print_r($query->errorInfo());
			return false;
		}
	}
	public function puntuarprofesion($idoficio,$puntuacion){
		$sql="UPDATE OFICIOS SET PUNTUACION=PUNTUACION+? , CANTIDAD_DE_PUNTUACIONES=CANTIDAD_DE_PUNTUACIONES+1 WHERE ID_OFICIO=?";
		$query=$con->prepare($sql);
		if($query->execute(array($puntuacion,$idoficio))){
			return true;
		}else{
			print_r($query->errorInfo());
			return false;
		}
	}
}

?>