<?php
	session_start();
	error_reporting(0);
	
	if(isset($_SESSION["email"]) and isset($_SESSION["idpro"]) and isset($_SESSION["id"])){
		if(isset($_POST["tipo"]) and (isset($_FILES["upload"]))){
			$email=$_SESSION["email"];
			$tipo=$_POST["tipo"];
			require_once ("../../blogic/Galery.php");
			$allowed = array("image/jpeg", "image/gif", "image/png");
			$galery=new Galery();
			$total = count($_FILES['upload']['name']);
			// Loop through each file
			for( $i=0 ; $i < $total ; $i++ ) {
				
				$file_type = $_FILES['upload']['type'][$i];
				if(!in_array($file_type, $allowed)) {
				  $error_message = 'Algunos archivos no son de tipo jpg,gif o png';

				  echo $error_message;

				  exit();

				}
			  //Get the temp file path
			  $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

			  if ($tmpFilePath != ""){
				//Setup our new file path
				$galery->subirfoto($_FILES['upload']["name"][$i],$_SESSION['idpro'],$tipo,$email,$tmpFilePath);
				
			  }
			}
			echo json_encode($galery->obtenerfotos((int)$_SESSION['idpro']));
		}
		else{
			echo "Algunas variables no se han ingresado";
		}
	}
	else{
		echo "Ha ocurrido un error en la sesion";
	}
	




?>