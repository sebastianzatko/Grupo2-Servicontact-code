<?php

	$nombre=isset($_POST['nombre'])? $_POST['nombre']:null;
	$apellido=isset($_POST['apellido'])? $_POST['apellido']:null;
	$telefono=isset($_POST['telefono'])? $_POST['telefono']:null;
	$direccion=isset($_POST['direccion'])? $_POST['direccion']:null;
	$provincia=isset($_POST['provincia'])? $_POST['provincia']:null;
	$localidad=isset($_POST['ciudad'])? $_POST['ciudad']:null;
	$imagen=$_FILES['fil'];

	require "../../blogic/User.php";
    $usuario=new b_user;
    $var=isset($_POST["nombre"]) and isset($_POST["apellido"])  and isset($_POST["telefono"]) and isset($_POST["direccion"]) and isset($_POST["provincia"]) and isset($_POST["localidad"]);
    //echo $var;
	
	if($var){    
		if($usuario->modificarUsuario($nombre,$apellido,$telefono,$imagen,$direccion,$provincia,$localidad)){
			echo "1";
		}else{
			echo "2";
		}
	}else{
	    
		echo "3";
	}


?>
