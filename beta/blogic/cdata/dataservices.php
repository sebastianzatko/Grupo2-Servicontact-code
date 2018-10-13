<?php
require_once('conexion/conectionpdo.php');

class data_serv {
	public function altaservicio($ID_profesional,$ID_servicio){
		$con = new Conexion();
		$query = $con->prepare("SELECT ID_OFICIO, PROFESIONAL_idPROFESIONAL, HABILITADO, SERVICIOS_idSERVICIO FROM OFICIOS WHERE (PROFESIONAL_idPROFESIONAL = ?) AND (SERVICIOS_idSERVICIO = ?)");
		
		if($query->execute(array($ID_profesional,$ID_servicio))){
            $result = $query->fetchAll();
            if (isset($result) && (count($result) != 0)) {
				$id_ofi=$result[0]['ID_OFICIO'];
				$con = null;
				$query = null;
				$con2 = new Conexion();
				$query2 = $con2->prepare("UPDATE OFICIOS SET HABILITADO=1 WHERE ID_OFICIO =:ID_OFICIO");
				$query2->bindParam(':ID_OFICIO', $id_ofi);
				if ($query2->execute()) {
					return True;
				} 
				else {
					return False;
				}
            }
            else {
				$con = null;
				$query = null;
				$con2 = new Conexion();
				$query2 = $con2->prepare("INSERT INTO OFICIOS (`PROFESIONAL_idPROFESIONAL`, `HABILITADO`, `SERVICIOS_idSERVICIO`) VALUES (:IDPROF, :HABILITADO, :IDSERV)");
				$query2->bindParam(':IDPROF', $ID_profesional);
				$habilitado = 1;
				$query2->bindParam(':HABILITADO', $habilitado);
				$query2->bindParam(':IDSERV', $ID_servicio);
				if ($query2->execute()) {
					$con2 = null;
					$query2 = null;
					return true;
				}
				else{
					$con = null;
					$query = null;
					return false;
				}
				
            }
		
		}
		else{ return false; }
	}
	
	public function bajaservicio($ID_profesional,$ID_servicio){
		$con = new Conexion();
		$query = $con->prepare("SELECT ID_OFICIO, PROFESIONAL_idPROFESIONAL, HABILITADO, SERVICIOS_idSERVICIO FROM OFICIOS WHERE (PROFESIONAL_idPROFESIONAL = ?) AND (SERVICIOS_idSERVICIO = ?)");
		
		if($query->execute(array($ID_profesional,$ID_servicio))){
            $result = $query->fetchAll();
            if (isset($result) && (count($result) != 0)) {
				$id_ofi=$result[0]['ID_OFICIO'];
				$con = null;
				$query = null;
				$con2 = new Conexion();
				$query2 = $con2->prepare("UPDATE OFICIOS SET HABILITADO=0 WHERE ID_OFICIO =:ID_OFICIO");
				$query2->bindParam(':ID_OFICIO', $id_ofi);
				if ($query2->execute()) {
					return True;
				} 
				else {
					return False;
				}
            }
            else { return false;}
				
        }
		else{ return false; }
	}
	
	public function getservices(){
		$con = new Conexion();
		$query = $con->prepare("SELECT idSERVICIO, TIPO, FACLASS FROM SERVICIOS"); 
		if($query->execute()){
			$result = $query->fetchAll();
			$datos = array();
			foreach($result as $row){
	        array_push($datos,[$row['idSERVICIO'],$row['TIPO'],$row['FACLASS']]);
			}
	        return $datos;
		}
		else { return false; }
	}
}

?>