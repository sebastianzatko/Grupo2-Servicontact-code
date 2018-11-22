<?php
	if(isset($_SESSION["id"])){
		if(isset($_POST["comentario"]) and isset($_POST["id_publicacion"])){
			$comentario=$_POST["comentario"];
			$idpublicacion=$_POST["id_publicacion"];
			if(is_numeric($idpublicacion) and strlen($comentario)<=300 and strlen($comentario)>=4){
				require("../../blogic/Comentario.php");
				$coment=new Comentario();
				if($coment->comentar($_SESSION["id"],$idpublicacion,$comentario)){
					echo "Se ha comentado con exito";
				}else{
					echo "No se ha podido comentar :( ,por favor,intente mas tarde";
				}
			}
			
		}
		
	}



?>