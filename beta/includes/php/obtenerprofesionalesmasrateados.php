<?php
	if(isset($_POST["localizacion"])){
		require("../../blogic/Wall.php");
		$localizacion=$_POST["localizacion"];
		$latlong=explode(',', $localizacion);
		$lat=(float)$latlong[0];
		$long=(float)$latlong[1];
		$wall=new Wall();
		$data=$wall->conseguirlosmejoresprofesionalesdelazona($lat,$long);
		echo json_encode($data);
		
	}




?>