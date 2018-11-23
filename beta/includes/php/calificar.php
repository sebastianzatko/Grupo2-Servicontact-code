<?php
include_once('../../blogic/User.php');
include_once('../../blogic/Services.php');
include_once('../../blogic/Puntuar.php');
include_once('../../blogic/Citas.php');

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
        $puntaje = $_POST['puntuacion'];
        $idprof = $_POST['profesional'];
        $idcita = $_POST['cita'];
        $S = new Services();
        $nservicios = $S->getservicios();
        echo json_encode($nservicios);
    }
    elseif (isset($_POST['cita'])){
        $idcita = $_POST['cita'];
        $cita = new cita();
        $datos = $cita->getcita((int)$idcita);
        echo json_encode($datos);
    }
}
?>
