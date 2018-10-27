<?php
include_once('cdata/dataservices.php');

class Services{
    
	public function activar_servicio($id_profesional,$id_servicio){
		if ((is_int($id_profesional)) and (is_int($id_servicio))){
			$servicio=new data_serv();
			if ($servicio->altaservicio($id_profesional,$id_servicio)){
				return true;
			}
			else {return false; }
		}
		else {return false; }
	}
	
	public function deshabilitar_servicio($id_profesional,$id_servicio){
		if ((is_int($id_profesional)) and (is_int($id_servicio))){
			$servicio=new data_serv();
			if ($servicio->bajaservicio($id_profesional,$id_servicio)){
				return true;
			}
			else {return false; }
		}
		else {return false; }
	}
	
	public function getservicios(){
	    $servicio = new data_serv();
	    $datos = $servicio->getservices();
	    return json_encode($datos);
	}
}
?>