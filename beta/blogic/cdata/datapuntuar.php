<?php
include_once('conexion/conectionpdo.php');

function makesubquery($stars){
	$count = [0,0,0,0,0];
	$SUBQ = '';
	foreach ($stars as $key => $E) {
		$count[$E-1] = $count[$E-1] + 1;
	}
	$SUBQ = '`1estrella` = `1estrella` + '.$count[0].', `2estrellas` = `2estrellas` + '.$count[1].', `3estrellas` = `3estrellas` + '.$count[2].', `4estrellas` = `4estrellas` + '.$count[3].', `5estrellas` = `5estrellas` + '.$count[4];
	//echo json_encode($SUBQ);
	return $SUBQ;
}

function makesubquery2($stars){
	$count = [0,0,0,0,0];
	$InputS = '';
	$values = '';
	foreach ($stars as $key => $E) {
		$count[$E-1] = $count[$E-1] + 1;
	}
	$values = $count[0].' ,'.$count[1].' ,'.$count[2].' ,'.$count[3].' ,'.$count[4];
	return $values;
}

class datapuntuar{
	public function dpuntuarusuario($idusuario,$puntuacion){
		$con = new Conexion();
		$query = $con->prepare("UPDATE `USUARIOS` SET `PUNTUACION`=`PUNTUACION`+:p, `CANTIDADDEPUNTUACIONES`=`CANTIDADDEPUNTUACIONES`+1 WHERE `idUSUARIO`=:id");
		$query->bindParam(':p',$puntuacion);
		$query->bindParam(':id', $idusuario);
		if($query->execute()){
			return true;
		}else{
			return false;
		}
	}
	public function dpuntuarprofesion($idprof,$idservicio,$puntuacion){
		$con = new Conexion();
		$query = $con->prepare("UPDATE `OFICIOS` SET `PUNTUACIÓN`=`PUNTUACIÓN`+?,`CANTIDAD_DE_PUNTUACIONES`=`CANTIDAD_DE_PUNTUACIONES`+1 WHERE `PROFESIONAL_idPROFESIONAL`=? AND `SERVICIOS_idSERVICIO`=?");
		if ($query->execute(array($puntuacion,$idprof,$idservicio))){
			return true;
		}else{
			return false;
		}
	}

	public function puntuacionestrellas($id,$tipo,$estrellas){
		$SUBQ = makesubquery($estrellas);
		$con = new Conexion();
		$query = $con->prepare("SELECT `id_puntuacion` FROM `PUNTUACION` WHERE `id_usuario`=:id AND `TIPOUSUARIO`=:tipo");
		$query->bindParam(':id',$id);
		$query->bindParam(':tipo',$tipo);
		if ($query->execute()){
			$result = $query->fetchAll();
			if (isset($result) && (count($result) != 0)) {
				$idpuntuacion = $result[0]['id_puntuacion'];
				$con2 = new Conexion();
				$query2 = $con2->prepare("UPDATE `PUNTUACION` SET $SUBQ WHERE `id_puntuacion`=:id");
				$query2->bindParam(':id',$idpuntuacion);
				if ($query2->execute()){
					return true;
				}
				else{
					echo json_encode('error 2');
					return false;}
			}
			else{
				$SQ = makesubquery2($estrellas);
				$con2 = new Conexion();
				$query2 = $con2->prepare("INSERT INTO `PUNTUACION`(`id_usuario`, `1estrella` ,`2estrellas`, `3estrellas`, `4estrellas`, `5estrellas` ,`TIPOUSUARIO`) VALUES (:id, $SQ, :tipo)");
				$query2->bindParam(':id',$id);
				$query2->bindParam(':tipo',$tipo);
				if ($query2->execute()){
					return true;
				}
				else{return false;}
			}

		}
		else{
			echo json_encode('error 1');
			return false;}
	}
}
//$dp = new datapuntuar();
//$res = $dp->puntuacionestrellas(102,'PROFESIONAL',[4,4,4,4,3,3,3]);
//echo json_encode($res);
?>
