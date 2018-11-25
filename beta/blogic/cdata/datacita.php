<?php
require_once('conexion/conectionpdo.php');

class data_cita {
	public function notificacion($from,$to,$mensaje){
	    $t = time();
		$con = new Conexion();
		$query = $con->prepare("INSERT INTO arrowchat (`from`, `to`, `message`, `sent`, `read`, `cita`) VALUES (:idcli, :idprof, :msj, :time,0,1)");
		$query->bindParam(':idprof', $to);
		$query->bindParam(':idcli', $from);
		$query->bindParam(':msj', $mensaje);
		$query->bindParam(':time',$t);
		if ($query->execute()) {
				$idnot = $con->lastInsertId();
				$msj2 = str_replace(":idnotificacion",$idnot,$mensaje);
				$con2 = new Conexion();
				$query2 = $con2->prepare("UPDATE `arrowchat` SET `message` = :msj WHERE `arrowchat`.`id` = :idnot");
				$query2->bindParam(':idnot', $idnot);
				$query2->bindParam(':msj', $msj2);
				$query2->execute();
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
		$servi = join(",",$servicios);
		$query3->bindParam(':serv', $servi);
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
		$query = $con->prepare("UPDATE CITAS SET estado='2' WHERE id_cita =:idcita and idprofesional=:prof and estado='1'");
		$query->bindParam(':idcita', $idcita);
		$query->bindParam(':prof', $idprofesional);
		if ($query->execute()) {
		    $con2 = new Conexion();
			$query2 = $con2->prepare("SELECT `idcliente` , `fecha` FROM `CITAS` WHERE id_cita=:id");
			$query2->bindParam(':id',$idcita);
			if ($query2->execute()){
				$result = $query2->fetchAll();
				$idcliente = $result[0]['idcliente'];
				$fecha = $result[0]['fecha'];
				return [$idcliente,$fecha];
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
			$query2 = $con2->prepare("SELECT `idcliente`, `fecha` FROM `CITAS` WHERE id_cita=:id");
			$query2->bindParam(':id',$idcita);
			if ($query2->execute()){
				$result = $query2->fetchAll();
				$idcliente = $result[0]['idcliente'];
				$fecha = $result[0]['fecha'];
				return [$idcliente,$fecha];
				}else{return false;}
						
		}else {return false;}
		
		}
	public function sol_finalizar_trabajo($idcita,$idprofesional){
	    $con = new Conexion();
		$query = $con->prepare("UPDATE CITAS SET estado='3' WHERE id_cita =:idcita and idprofesional=:prof and estado=2");
		$query->bindParam(':idcita', $idcita);
		$query->bindParam(':prof',$idprofesional);
		if ($query->execute()) {
		    $con2 = new Conexion();
			$query2 = $con2->prepare("SELECT `idcliente`,`fecha`,`servicios` FROM `CITAS` WHERE id_cita=:id");
			$query2->bindParam(':id',$idcita);
			if ($query2->execute()){
				$result = $query2->fetchAll();
				$idcliente = $result[0]['idcliente'];
				$fecha = $result[0]['fecha'];
				$serv = $result[0]['servicios'];
				return [$idcliente,$fecha,$serv];
				}else{return false;}
						
		}else {return false;}
		
		}
		public function finalizar_trabajo($idcita,$idcliente){
	    $con = new Conexion();
		$query = $con->prepare("UPDATE CITAS SET estado='4' WHERE id_cita =:idcita and idcliente=:cli and estado='3'");
		$query->bindParam(':idcita', $idcita);
		$query->bindParam(':cli',$idcliente);
		if ($query->execute()) {
		    $con2 = new Conexion();
			$query2 = $con2->prepare("SELECT `idprofesional`,`fecha`,`servicios` FROM `CITAS` WHERE id_cita=:id");
			$query2->bindParam(':id',$idcita);
			if ($query2->execute()){
				$result = $query2->fetchAll();
				$idprofesional = $result[0]['idprofesional'];
				$fecha = $result[0]['fecha'];
				$serv = $result[0]['servicios'];
				return [$idprofesional,$fecha,$serv];
				}else{return false;}
						
		}else {return false;}
		
		}
		
		public function nofinalizado($idcita,$idcliente){
	    $con = new Conexion();
		$query = $con->prepare("UPDATE CITAS SET estado='2' WHERE id_cita =:idcita and idcliente=:cli and estado='3'");
		$query->bindParam(':idcita', $idcita);
		$query->bindParam(':cli',$idcliente);
		if ($query->execute()) {
		    $con2 = new Conexion();
			$query2 = $con2->prepare("SELECT `idprofesional`,`fecha`,`servicios` FROM `CITAS` WHERE id_cita=:id");
			$query2->bindParam(':id',$idcita);
			if ($query2->execute()){
				$result = $query2->fetchAll();
				$idprofesional = $result[0]['idprofesional'];
				$fecha = $result[0]['fecha'];
				$serv = $result[0]['servicios'];
				return [$idprofesional,$fecha,$serv];
				}else{return false;}
						
		}else {return false;}
		
		}
		public function getcita($idcita){
		    $con = new Conexion();
			$query = $con->prepare("SELECT `idprofesional`, `idcliente`, `fecha`, `servicios`, `estado` FROM `CITAS` WHERE id_cita=:id");
			$query->bindParam(':id',$idcita);
			if ($query->execute()){
			    $resultado = $query->fetchAll();
			    $idprofesional = $resultado[0]['idprofesional'];
			    $idcliente = $resultado[0]['idcliente'];
			    $fecha = $resultado[0]['fecha'];
			    $servicios = $resultado[0]['servicios'];
			    $estado = $resultado[0]['estado'];
			    return [$idprofesional,$idcliente,$fecha,$servicios,$estado];
			}
			else{return false;}
		}
}

?>
