<?php
require_once('Validate.php');

function validar_formulario(){
	if(isset($_POST['nombre']) and isset($_POST['apellido']) and isset($_POST['email']) and isset($_POST['contrasena']) and isset($_POST['dir']) and isset($_POST['provincia']) and isset($_POST['ciudad']) and isset($_FILES['imagen'])){
		if (validar_nombre($_POST['nombre']) and validar_nombre($_POST['apellido']) and validar_mail($_POST['email']) and validar_texto($_POST['dir']) and validar_string($_POST['provincia']) and validar_string($_POST['ciudad']) and validar_imagen($_FILES['imagen']))
			return true;
		}else{return false;}
}


function validar_password($pass1,$pass2){
	if ($pass1 == $pass2){return true;}else{return false;}
}

function validar_imagen($archivo){
	if ($archivo['error'] !== UPLOAD_ERR_OK) {
	    echo 'Error al subir imagen.';
	   return false;
	}
	else {
	   $info = getimagesize($archivo['tmp_name']);
		if ($info === FALSE) {
		    echo 'El archivo cargado no es una imagen.';
			return false;
		}
		else {
			if (($info[2] !== IMAGETYPE_GIF) && ($info[2] !== IMAGETYPE_JPEG) && ($info[2] !== IMAGETYPE_PNG)) {
			    echo 'Solo se admiten imagenes. GIF / JPEG / PNG';
				return false;
			}
			else {return true;}
		}
	}
}

//Localidades
//Aceptados: Letras mayusculas y minusculas, con tildes, espacios.
//Rechazados: todo tipo de simbolos especiales y numeros
function validar_string($string){
	if (Validate::string($string, array('format' => VALIDATE_SPACE . VALIDATE_EALPHA_UPPER . VALIDATE_EALPHA_LOWER))){return true;}
	else {return false;}
}

function validar_nombre($string){
	if (Validate::string($string, array('format' => VALIDATE_EALPHA_UPPER . VALIDATE_EALPHA_LOWER))){return true;}
	else {return false;}
}

//Valida el mail. Ja.
function validar_mail($mail){
	if (Validate::email($mail, array('use_rfc822' => true))) {return true;} 
	else {return false;}
}

//Para comentarios o texto que incluya numeros, tildes, puntos y comas. (Direcciones).
//No se admiten caracteres especiales que no sean de puntuación/exclamación ( . , : ; ´ ? ! " )
function validar_texto($texto){
	if (Validate::string($texto, array('format' => VALIDATE_NUM . VALIDATE_SPACE . VALIDATE_EALPHA_UPPER . VALIDATE_EALPHA_LOWER . VALIDATE_PUNCTUATION))) {return true;} else {return false;}
}

//Validar cualquier campo que contenga numeros. SOLO NUMEROS! NO FLOAT, NO DECIMALES, NO NEGATIVOS!!!
function validar_numero($numero){
if (Validate::number($numero,array('decimal' => '', 'min' => 0, 'max' => 99999999999999 ))) {return true;}
	else {return false;}
}


//Validar campos alfanumericos
//Solo se admiten numeros y letras. No espacios, No simbolos. No tildes.
function validar_alfanumerico($alfanumerico){
	if (Validate::string($alfanumerico, array('format' => VALIDATE_NUM . VALIDATE_ALPHA_UPPER . VALIDATE_ALPHA_LOWER))) {return True;}
	else {return False;}
}

?>
