<?php
	session_start();
	if(isset($_SESSION["id"]) and isset($_POST["id_publicacion"])){
		$publicacion=$_POST["id_publicacion"];
		require("../../blogic/Comentario.php");
		$comentary=new Comentario();
		$arrayposta=array();
		function time_elapsed_string($datetime, $full = false) {
			$now = new DateTime;
			$ago = new DateTime($datetime);
			$diff = $now->diff($ago);

			$diff->w = floor($diff->d / 7);
			$diff->d -= $diff->w * 7;

			$string = array(
				'y' => 'year',
				'm' => 'month',
				'w' => 'week',
				'd' => 'day',
				'h' => 'hour',
				'i' => 'minute',
				's' => 'second',
			);
			foreach ($string as $k => &$v) {
				if ($diff->$k) {
					$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
				} else {
					unset($string[$k]);
				}
			}

			if (!$full) $string = array_slice($string, 0, 1);
			return $string ? implode(', ', $string) . ' ago' : 'just now';
		}
		
		$coment="";
		$listadecomentarios=$comentary->obtenercomentarios((int)$publicacion);
		foreach($listadecomentarios as $comentario){
			$fecha=time_elapsed_string($comentario[5]);
			$coment=$coment."<div class='comment-main-level'><div class='comment-avatar'><img class='user-small-img' src='".$comentario[2]."' alt=''></div><div class='comment-box'><div class='comment-head'><h6 class='comment-name by-author'>".$comentario[3]." ".$comentario[4]."</h6><span>".$fecha."</span></div><div class='comment-content'>".$comentario[1]."</div></div></div>";
			
		}	
			
		echo $coment;
	}else{
		
	}


?>