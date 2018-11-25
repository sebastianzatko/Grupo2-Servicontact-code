<?php
include_once('../../blogic/User.php');
include_once('../../blogic/Services.php');
include_once('../../blogic/Puntuar.php');
include_once('../../blogic/Citas.php');
include_once('../../blogic/Professional.php');

function serviciosid($servicios){
    $serviciosconid = [];
    $S = new Services();
    $nservicios = json_decode($S->getservicios());
    foreach($servicios as $serv){
	   foreach($nservicios as $ser){
	       if($ser[1] == $serv){
	            array_push($serviciosconid,[$ser[0],$ser[1]]);
	        }
	   }
    }
    return $serviciosconid;

}

if (isset($_SESSION['id'])){
    if (isset($_POST['getnombre']))
    {
        $id = $_POST['getnombre'];
        $user = new b_user();
        $datos = $user->obtenerDatosDeUsuario($id);
        echo json_encode($datos);
    }
    
    elseif (isset($_POST['puntuacion']) and isset($_POST['profesional']) and isset($_POST['cita']))
    {
        $cliente = $_SESSION['id'];
        $puntaje = $_POST['puntuacion'];
        $idprofU = $_POST['profesional'];
        $idcita = $_POST['cita'];
        $professional = new Professional();
        $idprofessional = $professional->getid($idprofU);
        $puntuar = new Puntuar();
        foreach ($puntaje as $p){
            $puntuar->puntuarprofesion($idprofessional,$p[1],$p[0]);
            $puntuar->puntuarusuario($idprofU,$p[0]);
        }
        $cita= new cita();
        $cita->finalizado($idcita,$cliente);
    }
    elseif (isset($_POST['cita'])){
        $idcita = $_POST['cita'];
        $cita = new cita();
        $datos = $cita->getcita((int)$idcita);
        $serviciossinid = explode(",", $datos[3]);
        if ($datos[4] = 3){
            $idU = $datos[0];
            $usuario = new b_user();
            $datosU = $usuario->obtenerDatosDeUsuario($idU);
            $d = $datosU->fetch_array();
            $nombre = $d['NOMBRE'];
            $S = serviciosid($serviciossinid);
        }
        echo json_encode([$datos,$nombre,$S]);
    }
}
?>
