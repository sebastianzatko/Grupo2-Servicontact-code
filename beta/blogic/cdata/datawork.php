<?php
require_once('conexion/conectionpdo.php');

class datawork{

	public function getfinishedworks($idprofesional){
		$con2 = new Conexion();
		$query2 = $con2->prepare("SELECT `idcliente`, `fecha`, `hora`, `servicios`, `estado` FROM `CITAS` WHERE idprofesional = :id AND (estado=3 or estado=4)");
		$query2->bindParam(':id',$idprofesional);
		if ($query2->execute()){
			$result = $query2->fetchAll();
			$finishedworks = [];
			foreach ($result as $row) {
				$idcliente = $row['idcliente'];
				$originalDate = $row['fecha'];
				$fecha = date("d/m/Y", strtotime($originalDate));
				$originalhour = $row['hora'];
				$hora = date("H:i", strtotime($originalhour));
				$servicios = $row['servicios'];
				$estado = $row['estado'];
				array_push($finishedworks,[$idcliente,$fecha,$hora,$servicios,$estado]);
			}
			return $finishedworks;
		}else{return false;}

	}
	public function getpendingworks($idprofesional){
		$con = new Conexion();
		$query = $con->prepare("SELECT `id_cita`, `idcliente`, `fecha`, `hora`, `servicios`, `estado` FROM `CITAS` WHERE idprofesional = :idprofesional AND estado=2");
		$query->bindParam(':idprofesional',$idprofesional);
		if ($query->execute()){
			$result = $query->fetchAll();
			$pendingworks = [];
			foreach ($result as $row) {
				$idcliente = $row['idcliente'];
				$originalDate = $row['fecha'];
				$fecha = date("d/m/Y", strtotime($originalDate));
				$originalhour = $row['hora'];
				$hora = date("H:i", strtotime($originalhour));
				$servicios = $row['servicios'];
				$idcita = $row['id_cita'];
				array_push($pendingworks,[$idcliente,$fecha,$hora,$servicios,$idcita]);
			}
			return $pendingworks; 
		}else{return false;}
	}
}