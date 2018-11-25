<?php 
    session_start();
    if(isset($_SESSION["nombre"]) and isset($_SESSION["foto"]) and isset($_SESSION["id"])){
		include_once("templates/menu.php");
		echo $htmlmenu2;
		include_once("templates/trabajos.html");
    }
    else{header("Location:principal.php");}
?>