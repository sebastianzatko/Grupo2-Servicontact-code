<?php
require_once('conexion/conectionpdo.php');

class datagalery{
	public function obtenerfotos($id_profesional){
		$con = new Conexion();
		$query = $con->prepare("SELECT `ID_IMAGEN`, `IMAGEN`, `TIPO` FROM `GALERIA` WHERE `PROFESIONAL_idPROFESIONAL`=?");
		if($query->execute(array($id_profesional))){
			$result = $query->fetchAll();
			$datos = array();
            foreach($result as $row){
				array_push($datos,[$row['ID_IMAGEN'],$row['IMAGEN'],$row['TIPO']]);
			}
	        return $datos;
		}
		else{
			return false;
		}
	}
	
	
	public function subirfoto($foto,$idprofesional,$tipo){
		$con = new Conexion();
		$query = $con->prepare("INSERT INTO `GALERIA`(`IMAGEN`, `PROFESIONAL_idPROFESIONAL`, `TIPO`) VALUES (?,?,?)");
		if($query->execute(array($foto,$idprofesional,$tipo))){
			return true;
		}
		else{
			return false;
		}
	}
}


?>