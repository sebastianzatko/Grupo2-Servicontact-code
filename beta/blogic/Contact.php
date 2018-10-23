<?php
    include_once('cdata/datacontact.php');
	class b_Contact{
		
		
		public function ingresarContacto($idcliente,$idprofesional){
		    $contacto=new datacontacto;
		    if($contacto->verificarcontacto($idcliente,$idprofesional)){
		        return true;
		    }else{
		        return false;
		    }
		}
	}
		    
		    
		    
?>