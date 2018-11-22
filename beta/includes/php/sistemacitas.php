<?
include_once('../../blogic/Citas.php');
include_once('../../blogic/Professional.php');
include_once('../../blogic/Services.php');

function main(){
    if (isset($_POST['tipo'])){
        $cita = new cita();
    //1
    if (($_POST['tipo']==1)and isset($_POST['cliente'])){
        $profesional = $_SESSION['id'];
        $cliente = $_POST['cliente'];
        $response = $cita->solicitud_cita($profesional,$cliente);
        echo json_encode($response);
    }
    //2
    elseif (($_POST['tipo']==2) and isset($_POST['idprof']) and isset($_POST['idnot'])){
        $cliente = $_SESSION['id'];
        $profesional = $_POST['idprof'];
        $notificacion = $_POST['idnot'];
        $cita->rechazar_solicitud_cita($profesional,$cliente,$notificacion);
    }
    //3
    elseif (($_POST['tipo']==3) and isset($_POST['profesional']) and isset($_POST['fecha']) and isset($_POST['hora']) and isset($_POST['servicios'])){
        $cliente = $_SESSION['id'];
        $profesional = $_POST['profesional'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $servicios = $_POST['servicios'];
        $cita->programar_cita($profesional,$cliente,$fecha,$hora,$servicios);
        
    }
    //4
    elseif (($_POST['tipo']==4) and isset($_POST['cita']) and isset($_POST['idnot'])){
        $profesional = $_SESSION['id'];
        $idcita = $_POST['cita'];
        $notificacion = $_POST['idnot'];
        $cita->aceptar_cita($idcita,$profesional,$notificacion);
    }
    //5
    elseif (($_POST['tipo']==5) and isset($_POST['cita']) and isset($_POST['idnot'])){
        $profesional = $_SESSION['id'];
        $profesional = $_SESSION['id'];
        $idcita = $_POST['cita'];
        $notificacion = $_POST['idnot'];
        $cita->rechazar_cita($idcita,$profesional,$notificacion);
    }
    //6
    elseif (($_POST['tipo']==6) and isset($_POST['cita'])){
        $profesional = $_SESSION['id'];
    }
    //7
    elseif (($_POST['tipo']==7) and isset($_POST['cita'])){
        $cliente = $_SESSION['id'];
    }
    //8
    elseif (($_POST['tipo']==8) and isset($_POST['profesional'])){
        $profesional= (int)$_POST['profesional'];
        $P = new Professional();
        $idprofesional = $P->getid($profesional);
        if ($idprofesional!=false){
        $servicios = $P->obtenerPuntuacionYServicios((int)$idprofesional);
        echo $servicios;
		}
		else {echo json_encode(false);}
    }
    }
}

if (isset($_SESSION['id'])){
    main();
}
?>
