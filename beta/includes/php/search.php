<?php

	require_once ("../../blogic/Search.php");
	$buscador=new b_Search;
	$arrayServicios=$_REQUEST["servicios"];
	$localizacion=$_REQUEST["localizacion"];
	
	$resultados=$buscador->buscarServicios($arrayServicios);
	
	echo json_encode($resultados);



?>