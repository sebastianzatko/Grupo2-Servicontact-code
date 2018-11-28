<?php
include_once('cdata/datacita.php');
session_start();
function txtservicios($servicios){
    if (count($servicios)>=1){
            foreach($servicios as $key=>$s){
                if ($key==0){
                    $servtxt = $s;
                }
        	    elseif (($key+1)==count($servicios)){
        		    $servtxt = $servtxt.' y '.$s;
        		}
        		else{
        		    $servtxt = $servtxt.', '.$s;
        		}
        	}
        	return $servtxt;
        }
    else{return $servicios;}
}

function fechaCastellano ($fecha) {
  $fecha = substr($fecha, 0, 10);
  $numeroDia = date('d', strtotime($fecha));
  $dia = date('l', strtotime($fecha));
  $mes = date('F', strtotime($fecha));
  $anio = date('Y', strtotime($fecha));
  $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
  $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
  $nombredia = str_replace($dias_EN, $dias_ES, $dia);
  $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
  $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
  $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
  return $nombredia." ".$numeroDia." de ".$nombreMes;
}

Class cita{
	//1
	public function solicitud_cita($profesional,$cliente){
	        $not_sol_cita = "<div id='not".$profesional."' class='alert alert-dismissible'>
	        El profesional esta solicitando que marques una cita para brindarte sus servicios. 
	        Elije a continuacion Citar para marcar una fecha y hora.
	        <br/>
	        <br/>
	        <a href='#' onclick=cargarform(".$profesional.") class='btn btn-success btn-xs' data-toggle='modal' data-target='#formcita'>Citar</a> 
	        <a href='#' onclick='cancelar(".$profesional.",:idnotificacion)' class='btn btn-danger btn-xs' data-dismiss='alert' aria-label='close'>Rechazar</a>
	        <br/>
	        <br/>
	        Solo tu puedes ver este mensaje.
	        </div>";
			$cita = new data_cita();
			$idcita = $cita->notificacion($profesional,$cliente,$not_sol_cita);
			if($idcita!=false)
			{
				return true;
			}else{return false;}
		}
	//2	
	public function rechazar_solicitud_cita($profesional,$cliente,$idnot){
	    $not_sol_cita_rechazada = '<div id="not'.$cliente.'" class="alert alert-dismissible">
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
		$idcita = $cita->nueva_cita($profesional,$cliente,$fecha,$hora,$servicios);
		$servtxt = txtservicios($servicios);
		$not_A_cita = '<div id="not'.$cliente.'" class="alert alert-dismissible">Recibiste una cita desde este cliente para tu/s servicio/s de 
		<b>'.$servtxt.'</b> para el dia 
		<b>'.fechaCastellano($fecha).'</b> a las 
		<b>'.$hora.' hs</b>.
		<br/>
		<a href="#" onclick="aceptarcita('.$idcita.',:idnotificacion)" class="btn btn-success btn-xs" data-dismiss="alert" aria-label="close">Aceptar</a> 
		<a href="#" onclick="rechazarcita('.$idcita.',:idnotificacion)" class="btn btn-danger btn-xs" data-dismiss="alert" aria-label="close">Rechazar</a>
		<br/>
		<br/>
		Solo tu puedes ver este mensaje.
		</div>';
		if ($idcita!=false){
			$cita->notificacion($cliente,$profesional,$not_A_cita);
		}
		else{return false;}
	}
	//4
	public function aceptar_cita($idcita,$profesional,$idnot){
		$cita = new data_cita();
		$r = $cita->aceptar_cita($idcita,$profesional,$idnot);
		if ($r!=false){
		    $not_cita_aceptada = '<div id="not'.$profesional.'" class="alert">El profesional ya aceptó tu cita para el dia '.fechaCastellano($r[1]).'.</div>';
		    $cita->notificacion($profesional,$r[0],$not_cita_aceptada);
		    $cita->borrar_notificacion($idnot,$profesional);
		}
		return $r;
		}
	//5
	public function rechazar_cita($idcita,$profesional,$idnot){
		$cita = new data_cita();
		$r = $cita->rechazar_cita($idcita,$profesional);
		$not_cita_rechazada = '<div id="not'.$profesional.'" class="alert">El profesional no aceptó tu cita para el dia '.fechaCastellano($r[0]).'.<br/><br/>Solo tu puedes ver este mensaje.</div>';
		if ($r!=false){
			$cita->notificacion($profesional,$r[0],$not_cita_rechazada);
			$cita->borrar_notificacion($idnot,$profesional);
			}
		}
	//6
	public function finalizar_trabajo($idcita,$profesional){
		$cita = new data_cita();
		$r = $cita->sol_finalizar_trabajo($idcita,$profesional);
		$servtxt = explode(",",$r[2]);
		$servicios = txtservicios($servtxt);
		$not_T_finalizado = '<div id="not'.$profesional.'" class="alert alert-dismissible">
		El profesional marcó como finalizado sus servicios de <b>'.$servicios.'<b/>, comenzados desde el dia <b>'.fechaCastellano($r[1]).'<b/>. ¿Estas de acuerdo?<br/>
		<a href="#" onclick="finalizado('.$idcita.',:idnotificacion)" class="btn btn-success btn-xs" data-dismiss="alert">Si</a> 
		<a href="#" onclick="nofinalizado('.$idcita.',:idnotificacion)" class="btn btn-danger btn-xs" data-dismiss="alert">No</a>
		<br/><br/>Solo tu puedes ver este mensaje.</div>';
		if ($r!=false){
			$cita->notificacion($profesional,$r[0],$not_T_finalizado);
			return true;
			}
		else{return false;}
	}

	public function finalizado($idcita,$cliente){
	    $cita = new data_cita();
	    $r = $cita->finalizar_trabajo($idcita,$cliente);
	    $servtxt = explode(",",$r[2]);
		$servicios = txtservicios($servtxt);
	    $notificacion = '<div id="not'.$cliente.'" class="alert">El cliente ya confirmo que has finalizado tus servicios como <b>'.$servicios.'<b/> que comenzaste el dia <b>'.fechaCastellano($r[1]).'<b/>
	    <a href="#" onclick="puntuarcliente('.$cliente.',:idnotificacion)" class="btn btn-success btn-xs" data-dismiss="alert" aria-label="close">Puntuar Cliente</a>
	    <br/><br/>Solo tu puedes ver este mensaje.</div>';
	    $cita->notificacion($cliente,$r[0],$notificacion);
	}
	
	public function nofinalizado($idcita,$cliente){
	    $cita = new data_cita();
	    $r = $cita->nofinalizado($idcita,$cliente);
	    $servtxt = explode(",",$r[2]);
		$servicios = txtservicios($servtxt);
	    $notificacion = '<div id="not'.$cliente.'" class="alert">El cliente informó que no has finalizado tus servicios como <b>'.$servicios.'<b/> que comenzaste el dia <b>'.fechaCastellano($r[1]).'<b/>. Tus servicios quedarán en estado pendiente.
	    <br/>Solo tu puedes ver este mensaje.</div>';
	    $cita->notificacion($cliente,$r[0],$notificacion);
	}
	
	public function getcita($idcita){
	    $cita = new data_cita();
	    $r = $cita->getcita($idcita);
	    return $r;
	}

	public function borrarnot($idnot,$to){
		$cita = new data_cita();
		$r = $cita->borrar_notificacion($idnot,$to);
		return $r;
	}
}
?>
