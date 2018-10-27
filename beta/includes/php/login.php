<?php
    if(isset($_POST["login"]) and isset($_POST["contra"])){
		require "../../blogic/User.php";
		$user=new b_user;
        if(isset($_POST["localizacion"])){
            $localizacion=$_REQUEST["localizacion"];
            $latlong=explode(',', $localizacion);
            $lat=(float)$latlong[0];
            $long=(float)$latlong[1];
            
        }else{
            $lat=null;
            $long=null;
        }
        
		$email=$_POST["login"];
		$contrasena=$_POST["contra"];
		if(filter_var($email,FILTER_VALIDATE_EMAIL) and is_string($contrasena)){
			if((strlen($email)<=120 and strlen($email)>=7) and (strlen($contrasena)<=80 and strlen($contrasena)>=8)){
				if($user->ingresar($email,$contrasena,$lat,$long)){
					//caso bueno
					
					echo "Ha ingresado correctamente";
				}else{
					//caso mal de que no esta habilitado, no concuerda mail y contra o no existe
				   
					echo "Los datos de ingreso son incorrectos";
				}
			}else{
				echo "Los campos no cumplen los requisitos de longuitud";
			}
		}else{
			echo "Existen campos invalidos";
		}
    }else{
        //caso mal de las variables no estan seteadas
		echo "Debe ingresar el mail y la contraseña para ingresar";
    }


?>