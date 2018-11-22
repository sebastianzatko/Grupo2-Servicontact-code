<?php
	if(isset($_SESSION["id"]) and ( $_SESSION["id"]!="")){
		require("../../blogic/Wall.php");
		$wall=new Wall();
		$publicacionesdelosamigos=$wall->conseguirloslasfotosdeloscontactos((int)$_SESSION["id"]);
		require("../../blogic/Comentario.php");
		$coment=new Comentario();
		$arrayposta=array();
		foreach($publicacionesdelosamigos as $publicacion){
			$coment="";
			$listadecomentarios=$coment->obtenercomentarios($publicacion[0]);
			foreach($listadecomentarios as $comentario){
				$coment=$coment."<div class='comment-main-level'><div class='comment-avatar'><img class='user-small-img' src='".$comentario[]."' alt=""></div><div class='comment-box'><div class='comment-head'><h6 class='comment-name by-author'>".$comentario[]."</h6><span>".$comentario[]."</span></div><div class='comment-content'>".$comentario[]."</div></div></div>";
			}
			array_push($publicacion,$coment);
			array_push($arrayposta,$coment);
			
			
		}
		echo json_encode($arrayposta);
	}
	

?>