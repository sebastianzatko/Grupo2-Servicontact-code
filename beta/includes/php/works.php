<?php
include_once('../../blogic/Works.php');
include_once('../../blogic/Citas.php');
include_once('../../blogic/User.php');

function getnombre($id){
	$cliente = new b_user();
	$datos = $cliente->obtenerDatosDeUsuario((int)$id);
	$datoscliente = $datos->fetch_array();
	$nombrec = $datoscliente['NOMBRE'].' '.$datoscliente['APELLIDO'];
	return $nombrec;
}

if (isset($_SESSION['id'])){
	$idprofesional = $_SESSION['id'];
	$works = new Works();

	if (isset($_POST['finalizados'])){
		$wfinalizados = $works->getfinishedworks($idprofesional);
		$lista = [];
		foreach ($wfinalizados as $F){
			$idF = $F[0];
			$nombrecliente = getnombre($idF);
			array_push($lista,[$nombrecliente,$F[1],$F[2],$F[3],$F[4]]);
		}
		echo json_encode($lista);
	}
	elseif (isset($_POST['pendientes'])){
		$wpendientes = $works->getpendingworks($idprofesional);
		$listap = [];
		foreach ($wpendientes as $P){
			$idP = $P[0];
			$nombrecliente = getnombre($idP);
			array_push($listap,[$nombrecliente,$P[1],$P[2],$P[3],$P[4]]);
		}
		echo json_encode($listap);	
	}
	//
	elseif (isset($_POST['trabajof'])){
		$idcita = $_POST['trabajof'];
		$cita = new cita();
		$response = $cita->finalizar_trabajo($idcita,$idprofesional);
		echo json_encode($response);
	}
}
else{echo json_encode('false');}
?>