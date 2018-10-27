<?php
    require_once('conexion/conectionpdo.php');

class datacontacto{
	
	
    public function nuevocontacto($idcliente,$idprofesional){
        $con = new Conexion();
		$query = $con->prepare("INSERT INTO `CONTACTOS` (`idUSERPROFESIONAL`, `idUSERCLIENTE`, `ESTADO`) VALUES (:idcliente,:idpro,'1')");
		
		$query->bindParam(':idcliente',$idcliente);
		$query->bindParam(':idpro',$idprofesional);
		
		
		if($query->execute()){
            return true;
        }
        else {return false;}
    }
    
    public function verificarcontacto($idcliente,$idprofesional){
        $con = new Conexion();
        
        $query1=$con->prepare("SELECT idCONTACTO FROM CONTACTOS WHERE 	idUSERCLIENTE=:idcliente AND idUSERPROFESIONAL=:idpro");
        $query1->bindParam(':idcliente',$idcliente);
		$query1->bindParam(':idpro',$idprofesional);
        if($query1->execute()){
            $result = $query1->fetchAll();
            if(isset($result)&& count($result!=0)){
                if($this->nuevocontacto($idcliente,$idprofesional)){
                    return true;
                }else{
                    return false;
                }
                
            }else{
                return true;
            }
        }else{
            
            return false;
        }
    }
}


?>