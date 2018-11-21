<?php
include_once('cdata/datacita.php');

$not_puntuacion = '';

Class cita{
	//1
	public function solicitud_cita($profesional,$cliente){
	        $not_sol_cita = '<div class="alert alert-dismissible">
	        El profesional esta solicitando que marques una cita para brindarte sus servicios. 
	        Elije a continuacion Citar para marcar una fecha y hora.
	        <br/>
	        <br/>
	        <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#formcita">Citar</a> 
	        <a href="#"  class="btn btn-danger btn-xs" data-dismiss="alert" aria-label="close">Rechazar</a>
	        <br/>
	        <br/>
	        Solo tu puedes ver este mensaje.
	        </div>';
			$cita = new data_cita();
			if($cita->notificacion($profesional,$cliente,$not_sol_cita,1))
			{
				return true;
			}else{return false;}
		}
	//2	
	public function rechazar_solicitud_cita($profesional,$cliente,$idnot){
	    $not_sol_cita_rechazada = '<div class="alert alert-dismissible">
	    El cliente ha deseado no pactar una cita por el momento.
	    <br/>
	    <br/>
	    Solo tu puedes ver este mensaje.
	    </div>';
		//borrar
		$cita = new data_cita();
		if($cita->borrar_notificacion($idnot,$cliente)){
		//notificar
			$cita->notificacion($cliente,$profesional,$not_sol_cita_rechazada);	
			}else{return false;}
		}
	//3
	public function programar_cita($profesional,$cliente,$fecha,$hora,$servicios){
		$cita = new data_cita();
		$idcita=$cita->nueva_cita($profesional,$cliente,$fecha,$hora,$servicios);
		//$not_A_cita = '<div class="alert">Recibiste una cita desde este cliente para tu/s servicio/s de <b>'.$servicios.'<b> para el dia <b>'.$fecha.'</b> a las <b>'.$hora.' hs</b>.<br/><a href="#" class="btn btn-success btn-xs">Aceptar</a> <a href="#"  class="btn btn-danger btn-xs">Rechazar</a><br/><br/>Solo tu puedes ver este mensaje.</div><div class="alert"></div>';
		if ($idcita!=false){
			$cita->notificacion($cliente,$profesional,$not_A_cita);
		}
		else{return false;}
	}
	//4
	public function aceptar_cita($idcita,$profesional){
		$cita = new data_cita();
		$r = $cita->aceptar_cita($idcita,$profesional);
		return $r;
		}
	//5
	public function rechazar_cita($idcita,$profesional){
		$cita = new data_cita();
		$idcliente = $cita->rechazar_cita($idcita,$profesional);
		//$not_cita_rechazada = '<div class="alert alert-dismissible">El profesional no aceptó tu cita para el dia '.$fecha.'. Por servicios de '.$servicios.'.<br/><br/>Solo tu puedes ver este mensaje.</div>';
		if ($r!=false){
			$cita->notificacion($profesional,$idcliente,$not_cita_rechazada);
			}
		}
	//6
	public function finalizar_trabajo($idcita,$idprofesional){
		$cita = new data_cita();
		$r = $cita->finalizar_trabajo($idcita,$profesional);
		//$not_T_finalizado = '<div class="alert alert-dismissible">El profesional marcó como finalizado sus servicios de '.$servicios.'. ¿Estas de acuerdo? <br/><br/><a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#formcita">Si</a> <a href="#"  class="btn btn-danger btn-xs" data-dismiss="alert" aria-label="close">No</a><br/><br/>Solo tu puedes ver este mensaje.</div>';
		if ($r!=false){
			$cita->notificacion($profesional,$idcliente,$not_T_finalizado);
			}
		}
}

function main(){
    if (isset($_POST['tipo'])){
    //1
    if (($_POST['tipo']==1)and isset($_POST['cliente'])){
        $profesional = $_SESSION['id'];
        
    }
    //2
    elseif (($_POST['tipo']==2) and isset($_POST['profesional']) and isset($_POST['idnot'])){
        $cliente = $_SESSION['id'];
        
    }
    //3
    elseif (($_POST['tipo']==3) and isset($_POST['profesional']) and isset($_POST['fecha']) and isset($_POST['hora']) and isset($_POST['servicios'])){
        $cliente = $_SESSION['id'];
        
    }
    //4
    elseif (($_POST['tipo']==4) and isset($_POST['cita'])){
        $profesional = $_SESSION['id'];
 
    }
    //5
    elseif (($_POST['tipo']==5) and isset($_POST['cita'])){
        $profesional = $_SESSION['id'];
    }
    //6
    elseif (($_POST['tipo']==6) and isset($_POST['cita'])){
        $profesional = $_SESSION['id'];
    }
    }
}

?>