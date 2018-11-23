<?php

require_once ("../../blogic/Search.php");
	$buscador=new b_Search;
	$arrayServicios=$_REQUEST["servicios"];
	$pronvincia=$_POST["pronvincia"];
	$ciudad=$_POST["ciudad"];
	$resultados=$buscador->buscarServiciosFiltrados($arrayServicios,$pronvincia,$ciudad);
	
	echo json_encode($resultados);
	
?>