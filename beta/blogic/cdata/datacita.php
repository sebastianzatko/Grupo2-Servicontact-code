<?php
require_once('conexion/conectionpdo.php');

class data_cita {
	public function notificacion($from,$to,$mensaje){
		$con = new Conexion();
		$query = $con->prepare("INSERT INTO arrowchat (`from`, `to`, `message`, `sent`, `read`, `user_read`, `direction`, `cita`) VALUES (:idcli, :idprof, :msj,1,0,0,0,1)");
		$query->bindParam(':idprof', $to);
		$query->bindParam(':idcli', $from);
		$query->bindParam(':msj', $mensaje);
		if ($query->execute()) {
				$idnot = $con->lastInsertId();
				$con = null;
				$query = null;
				return $idnot;
			}
			else{
				$con = null;
				$query = null;
				return false;
			}
		}
	public function borrar_notificacion($idnot,$to){
		$con = new Conexion();
		$query = $con->prepare("DELETE FROM arrowchat where arrowchat.id=? and arrowchat.to=? and arrowchat.cita=1");
		if ($query->execute(array($idnot,$to))) {
				$con = null;
				$query = null;
				return true;
			}
			else{
				$con = null;
				$query = null;
				return false;
			}
		}
		
	public function nueva_cita($profesional,$cliente,$fecha,$hora,$servicios){
		$con3 = new Conexion();
		$query3 = $con3->prepare("INSERT INTO `CITAS` (`idprofesional`, `idcliente`, `fecha`, `hora`, `servicios`, `estado`) VALUES (:prof, :cli, :f, :h, :serv, '1')");
		$query3->bindParam(':cli', $cliente);
		$query3->bindParam(':prof', $profesional);
		$query3->bindParam(':f', $fecha);
		$query3->bindParam(':h', $hora);
		$query3->bindParam(':serv', $servicios);
		if ($query3->execute()) {
				$id = $con3->lastInsertId();
				$con3 = null;
				$query3 = null;
				return $id;
			}
			else{
				$con3 = null;
				$query3 = null;
				return false;
			}
		}
		
	public function aceptar_cita($idcita,$idprofesional){
	    $con = new Conexion();
		$query = $con->prepare("UPDATE CITAS SET estado='2' WHERE id_cita =:idcita and idprofesional=:prof");
		$query->bindParam(':idcita', $idcita);
		$query->bindParam(':prof', $idprofesional);
		if ($query->execute()) {
		    $con2 = new Conexion();
			$query2 = $con2->prepare("SELECT `idcliente` FROM `CITAS` WHERE id_cita=:id");
			$query2->bindParam(':id',$idcita);
			if ($query2->execute()){
				$result = $query2->fetchAll();
				$idcliente = $result[0]['idcliente'];
				return $idcliente;
				}else{return false;}
						
		}else {return false;}
		
		}
	public function rechazar_cita($idcita,$idprofesional){
	    $con = new Conexion();
		$query = $con->prepare("UPDATE CITAS SET estado='0' WHERE id_cita=:id and idprofesional=:prof");
		$query->bindParam(':id', $idcita);
		$query->bindParam(':prof',$idprofesional);
		if ($query->execute()) {
		    $con2 = new Conexion();
			$query2 = $con2->prepare("SELECT `idcliente` FROM `CITAS` WHERE id_cita=:id");
			$query2->bindParam(':id',$idcita);
			if ($query2->execute()){
				$result = $query2->fetchAll();
				$idcliente = $result[0]['idcliente'];
				return $idcliente;
				}else{return false;}
						
		}else {return false;}
		
		}
	public function finalizar_trabajo($idcita,$idprofesional){
	    $con = new Conexion();
		$query = $con->prepare("UPDATE CITAS SET estado='3' WHERE id_cita =:idcita and idprofesional=:prof");
		$query->bindParam(':idcita', $idcita);
		$query->bindParam(':prof',$idprofesional);
		if ($query->execute()) {
		    $con2 = new Conexion();
			$query2 = $con2->prepare("SELECT `idcliente` FROM `CITAS` WHERE id_cita=:id");
			$query2->bindParam(':id',$idcita);
			if ($query2->execute()){
				$result = $query2->fetchAll();
				$idcliente = $result[0]['idcliente'];
				return $idcliente;
				}else{return false;}
						
		}else {return false;}
		
		}
}

//$cita = new data_cita();
//$r = $cita->finalizar_trabajo(6);
//echo json_encode($r);

//INSERT INTO `CITAS` (`id_cita`, `idprofesional`, `idcliente`, `fecha`, `hora`, `servicios`, `estado`) VALUES (NULL, '120', '170', '2018-11-22', '16:00', '[1,2,3,4,5,6,7]', '1')
?>
