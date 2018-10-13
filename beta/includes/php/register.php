<?php
    require_once ("../../blogic/User.php");
    require_once('validardatos.php');

	//validar el seteo de datos
	if(validar_formulario()){
        
		$usuario=new b_user;
		$nombre=$_POST["nombre"];
		$apellido=$_POST["apellido"];
		$email=$_POST["email"];
		$password=$_POST["contrasena"];
		$telefono=$_POST["telefono"];
		$direccion=$_POST["dir"];
		$provincia=$_POST["provincia"];
		$ciudad=$_POST["ciudad"];
		$imagen=$_FILES["imagen"];
		//validar el tipo de dato
		if(true){
				//validar longutud de los datos
				if((strlen($nombre)<=45) 
				and (strlen($nombre)>=3) 
				and (strlen($apellido)<=45) 
				and (strlen($apellido)>=3) 
				and (strlen($email)<=120) 
				and (strlen($email)>=7) 
				and (strlen($direccion)<=80) 
				and (strlen($direccion)>=5) 
				and (strlen($provincia)<=80) 
				and (strlen($localidad)<=80) 
				and (strlen($password)<=80 
				and strlen($password)>=8) 
				and (strlen($telefono)<=11 
				and strlen($telefono)>=8)){
					if($usuario->registrar($nombre,$apellido,$telefono,$email,$password,$imagen,$direccion,$provincia,$ciudad)){
						//caso de exito
						echo "Se ha registrado exitosamente";
					}else{
						//aca iria otro error de que no se pudo registrar porque ya existe la cuenta 
						echo "Ya existe una cuenta con este correo electronico";
					}	
				}else{
					echo "La longuitud de uno o mas datos es incorrecta, porfavor vuelva a intentar o recarge la pagina";
				}
			}else{
				echo "Algunos datos no son correctos, por favor recarge la pagina";
		}
	}
?>