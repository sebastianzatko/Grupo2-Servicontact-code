<?php
require_once('conexion/conectionpdo.php');

class dataprofessional{
	
	public function nuevo_profesional($id_usuario){
		
		$con = new Conexion();
		$query = $con->prepare("SELECT idUSUARIO, TIPO_USUARIO FROM USUARIOS WHERE (idUSUARIO = ?)");
		if($query->execute(array($id_usuario))){
            $result = $query->fetchAll();
            if (isset($result)&& count($result!=0)){
				$tipo = $result[0]['TIPO_USUARIO'];
				echo json_encode($tipo);
				if (($tipo==NULL) or ($tipo==0)){
					$con = null;
					$con2 = new Conexion();
					$query2 = $con2->prepare("UPDATE USUARIOS SET TIPO_USUARIO=1 WHERE idUSUARIO =:ID_USUARIO");
					$query2->bindParam(':ID_USUARIO', $id_usuario);
					if ($query2->execute()){
						$con2 = null;
						$con3 = new Conexion();
						$query3 = $con3->prepare("INSERT INTO `PROFESIONALES`(`USUARIO_idUSUARIO`) VALUES (:ID_USUARIO)");
						$query3->bindParam(':ID_USUARIO', $id_usuario);
						if ($query3->execute()) {
							$con3 = null;
							return true;
						}
						else{
							$con3 = null;
							return false;
						}
				
					}
					else{
							$con3 = null;
							return false;
						}
				}
				else{return false;}
			}
			else{return false;}
		}
		else{return false;}
	}
    public function get_idprofesional($id_usuario){
        $con = new Conexion();
		$query = $con->prepare("SELECT idPROFESIONAL, USUARIO_idUSUARIO FROM PROFESIONALES WHERE (USUARIO_idUSUARIO = ?)");
		if($query->execute(array($id_usuario))){
            $result = $query->fetchAll();
            if (isset($result)&& count($result!=0)){
                $idprofesional = $result[0]['idPROFESIONAL'];
                return $idprofesional;
            }
            else {return false;}
        }
        else {return false;}
    }
    
    public function getservicios($id_profesional){
        $con = new Conexion();
        $query = $con->prepare("SELECT SERVICIOS_idSERVICIO FROM OFICIOS WHERE (PROFESIONAL_idPROFESIONAL = ?) AND (HABILITADO = 1)");
        if($query->execute(array($id_profesional))){
            $result = $query->fetchAll();
            $datos = array();
            foreach($result as $row){
	        array_push($datos,(int)$row['SERVICIOS_idSERVICIO']);
			}
	        return $datos;
        }
    }
    public function actualizarcoordenadas($lat,$long,$idprofesional){
        $con=new Conexion();
        $query=$con->prepare("UPDATE PROFESIONALES SET LATITUD=? , LONGUITUD=? WHERE idPROFESIONAL=?");
        if($query->execute(array($lat,$long,$idprofesional))){
            return true;
        }else{
            return false;
        }
    }
    public function obtenerpuntuacionyservicios($id_profesional){
        $con=new Conexion();
        $query=$con->prepare("SELECT OFICIOS.PUNTUACIÓN,OFICIOS.CANTIDAD_DE_PUNTUACIONES,SERVICIOS.FACLASS,SERVICIOS.TIPO FROM OFICIOS,SERVICIOS WHERE OFICIOS.PROFESIONAL_idPROFESIONAL=? AND OFICIOS.SERVICIOS_idSERVICIO=SERVICIOS.idSERVICIO AND OFICIOS.HABILITADO=1");
        if($query->execute(array((int)$id_profesional))){
            $result = $query->fetchAll();
            $datos = array();
            foreach($result as $row){
	            array_push($datos,[$row['PUNTUACIÓN'],$row['CANTIDAD_DE_PUNTUACIONES'],$row['FACLASS'],$row['TIPO']]);
			}
	        return $datos;
        }else{
            return false;
        }
        
    }
    
}

?>