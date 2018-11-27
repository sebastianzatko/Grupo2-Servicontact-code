<?php
include_once('../../blogic/Works.php');
include_once('../../blogic/Citas.php');
include_once('../../blogic/User.php');

function getnombre($id){
	$cliente = new b_user();
	$datos = $cliente->obtenerDatosDeUsuario($id);
	$datoscliente = $datos->fetch_array();
	$nombrecliente = $datoscliente['NOMBRE'].' '.$datoscliente['APELLIDO'];
	return $nombrecliente;
}

if (isset($_SESSION['id'])){
	$idprofesional = $_SESSION['id'];
	$works = new Works();

	if (isset($_POST['finalizados'])){
		$wfinalizados = $works->getfinishedworks($idprofesional);
		$lista1 = [];
		foreach ($wfinalizados as $F) {
			$idF = $F[0];
			$nombrecliente = getnombre($idF);
			array_push($lista1,[$nombrecliente,$F[1],$F[2],$F[3],$F[4]]);
		}
		echo json_encode($lista1);

	}
	elseif (isset($_POST['pendientes'])){
		$wpendientes = $works->getpendingworks($idprofesional);
		$lista2 = [];
		foreach ($wpendientes as $P) {
			$idP = $P[0];
			$nombrecliente = getnombre($idP);
			array_push($lista2,[$nombrecliente,$P[1],$P[2],$P[3],$P[4]]);
		}
		echo json_encode($lista2);	
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