<?php
include_once('cdata/dataprofessional.php');

class Professional{
    
    public function nuevo($id_usuario){
        $professional = new dataprofessional();
        if (is_int($id_usuario)){
            $r = $professional->nuevo_profesional($id_usuario);
            return $r;
        }
        else{ return false;}
    }
    
    public function getid($id_usuario){
        $professional = new dataprofessional();
        if (is_int($id_usuario)){
            $id = $professional->get_idprofesional($id_usuario);
            return $id;
        }
        else{ return false;}
    }
    
    public function get_servicios($id_profesional){
	    $prof = new dataprofessional();
	    if (is_int($id_profesional)){
	        $datos = $prof->getservicios($id_profesional);
	        return json_encode($datos);
	    }
	    else {return false;}
	}
}

?>