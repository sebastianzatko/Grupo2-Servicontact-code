<?php
require_once('conexion/conectionpdo.php');
class datapuntuar{
	public function puntuarusuario($idusuario,$puntuacion){
		$con = new Conexion();
		$sql="UPDATE USUARIOS SET PUNTUACION=PUNTUACION+:p , CANTIDAD_DE_PUNTUACIONES=CANTIDAD_DE_PUNTUACIONES+1 WHERE idUSUARIO=:id";
		$query=$con->prepare($sql);
		$query->bindParam(':p',$puntuacion);
		$query->bindParam(':id', $idusuario);
		if($query->execute()){
			return true;
		}else{
			print_r($query->errorInfo());
			return false;
		}
	}
	public function puntuarprofesion($idprof,$idservicio,$puntuacion){
		$con = new Conexion();
		$sql="UPDATE OFICIOS SET PUNTUACION=PUNTUACION+:p , CANTIDAD_DE_PUNTUACIONES=CANTIDAD_DE_PUNTUACIONES+1 WHERE PROFESIONAL_idPROFESIONAL=:idp AND SERVICIOS_idSERVICIO=:ids";
		$query->bindParam(':p',$puntuacion);
		$query->bindParam(':idp', $idprof);
		$query->bindParam(':ids', $idservicio);
		$query=$con->prepare($sql);
		if($query->execute()){
			return true;
		}else{
			print_r($query->errorInfo());
			return false;
		}
	}
}

?>
