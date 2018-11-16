<?php
require_once('conexion/conectionpdo.php');
class datawall{
	public function conseguirserviciosmasbuscados(){
		$con = new Conexion();
		$query=$con->prepare("SELECT idSERVICIO,TIPO,FACLASS,CANTIDADVECESBUSCADO,IMAGEN FROM `SERVICIOS` ORDER BY CANTIDADVECESBUSCADO DESC LIMIT 4");
		$query->execute();
		$result = $query->fetchAll();
		$datos = array();
		foreach($result as $row){
			array_push($datos,[$row["idSERVICIO"],$row["TIPO"],$row["FACLASS"],$row["CANTIDADVECESBUSCADO"],$row["IMAGEN"]]);
		}
		return $datos;
	}
	//No es lo que pidio pero esta cerca de ser eso, la queri que consigue los maximos es fija, es esa sin duda
	public function conseguirfotosmejoresdelosserviciosmejoresrateados(){
		$con =new Conexion();
		$query=$con->prepare("SELECT
    GALERIA.PROFESIONAL_idPROFESIONAL,
    GALERIA.TIPO,
    GALERIA.IMAGEN,
    GALERIA.ID_IMAGEN,
	 GALERIA.fecha
FROM
    GALERIA JOIN
    (
    SELECT
        OFICIOS.PROFESIONAL_idPROFESIONAL,
        SERVICIOS.TIPO,
        MAX(
            OFICIOS.PUNTUACIÓN / OFICIOS.CANTIDAD_DE_PUNTUACIONES
        ) AS ordenacion
    FROM
        OFICIOS,
        SERVICIOS
    WHERE
        OFICIOS.SERVICIOS_idSERVICIO = SERVICIOS.idSERVICIO
    GROUP BY
        SERVICIOS.TIPO
) AS maximos 
WHERE
    GALERIA.PROFESIONAL_idPROFESIONAL = maximos.PROFESIONAL_idPROFESIONAL AND GALERIA.TIPO IN(
    SELECT
        SERVICIOS.TIPO
    FROM
        SERVICIOS
)
GROUP BY
    GALERIA.TIPO");
		$query->execute();
		$result=$query->fetchAll();
		$datos=array();
		foreach($result as $row){
			array_push($datos,[$row["PROFESIONAL_idPROFESIONAL"],$row["TIPO"],$row["IMAGEN"],$row["ID_IMAGEN"],$row["fecha"]]);
		}
		return $datos;
	}
	

	//Este talvez no funcione, es una query muy complicada
	public function conseguirlosmejoresprofesionalesdelazona($lat,$long){
		$con =new Conexion();
		$query=$con->prepare("SELECT
						USUARIOS.idUSUARIO,
						USUARIOS.NOMBRE,
						USUARIOS.APELLIDO,
						USUARIOS.FOTO_DE_PERFIL,
						MAX(OFICIOS.PUNTUACIÓN/
						OFICIOS.CANTIDAD_DE_PUNTUACIONES) as puntuacion,
						SERVICIOS.TIPO,
						SERVICIOS.FACLASS,
							
							111.1111 *
							DEGREES(ACOS(COS(RADIANS(".$lat."))
								 * COS(RADIANS(PROFESIONALES.LATITUD))
								 * COS(RADIANS(".$long.") - RADIANS(PROFESIONALES.LONGUITUD))
								 + SIN(RADIANS(".$lat."))
								 * SIN(RADIANS(PROFESIONALES.LATITUD)))) AS DISTANCIA
					FROM
						USUARIOS,
						OFICIOS,
						PROFESIONALES,
						SERVICIOS
					WHERE
						USUARIOS.idUSUARIO = PROFESIONALES.USUARIO_idUSUARIO AND OFICIOS.PROFESIONAL_idPROFESIONAL = PROFESIONALES.idPROFESIONAL AND OFICIOS.SERVICIOS_idSERVICIO = SERVICIOS.idSERVICIO 
						AND OFICIOS.HABILITADO=1".$idusuario."
						ORDER BY DISTANCIA ASC,puntuacion DESC
						GROUP BY SERVICIOS.TIPO");
		if($query->execute()){
			$result=$query->fetchAll();
			$datos=array();
			foreach($result as $row){
				array_push($datos,[$row["PROFESIONAL_idPROFESIONAL"],$row["TIPO"],$row["IMAGEN"],$row["ID_IMAGEN"],$row["fecha"],$row["fecha"],$row["fecha"],$row["fecha"],$row["fecha"]]);
			}
			return $datos;
		}else{
			echo "Error con la consulta en la bd";
		}
		
	}
	
	public function conseguirlafotosdeloscontactos($idusuario){
		$con =new Conexion();
		$query=$con->prepare("SELECT GALERIA.ID_IMAGEN,GALERIA.IMAGEN,GALERIA.fecha FROM GALERIA WHERE GALERIA.PROFESIONAL_idPROFESIONAL IN (SELECT CONTACTOS.idUSERPROFESIONAL FROM `CONTACTOS` WHERE CONTACTOS.idUSERCLIENTE=?) ORDER BY fecha DESC");
		if($query->execute(array($idusuario))){
			$result=$query->fetchAll();
			$datos=array();
			foreach($result as $row){
				array_push($datos,[$row["ID_IMAGEN"],$row["fecha"],$row["IMAGEN"]]);
			}
			return $datos;
		}else{
			return false;
		}
	}


}






?>