<?php

	require_once ("../../blogic/Search.php");
	$buscador=new b_Search;
	$arrayServicios=$_REQUEST["servicios"];
	
	if(isset($_POST["localizacion"])){
            $localizacion=$_POST["localizacion"];
            $latlong=explode(',', $localizacion);
            $lat=(float)$latlong[0];
            $long=(float)$latlong[1];
            
    }else{
        $lat=null;
        $long=null;
    }
	
	
	
	
	
	$resultados=$buscador->buscarServicios($arrayServicios,$lat,$long);
	
	echo json_encode($resultados);



?>