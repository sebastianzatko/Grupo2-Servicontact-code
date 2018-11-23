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
								PROFESIONALES.idPROFESIONAL,
								USUARIOS.idUSUARIO,
								USUARIOS.NOMBRE,
								USUARIOS.APELLIDO,
								USUARIOS.FOTO_DE_PERFIL,
								(
									OFICIOS.PUNTUACIÓN / OFICIOS.CANTIDAD_DE_PUNTUACIONES
								) AS puntuacion,
								OFICIOS.PUNTUACIÓN,
								OFICIOS.CANTIDAD_DE_PUNTUACIONES,
								SERVICIOS.TIPO,
								SERVICIOS.FACLASS
							FROM
								USUARIOS,
								OFICIOS,
								PROFESIONALES,
								SERVICIOS
							WHERE
								USUARIOS.idUSUARIO = PROFESIONALES.USUARIO_idUSUARIO AND OFICIOS.PROFESIONAL_idPROFESIONAL = PROFESIONALES.idPROFESIONAL AND OFICIOS.SERVICIOS_idSERVICIO = SERVICIOS.idSERVICIO AND OFICIOS.HABILITADO = 1 AND (OFICIOS.PUNTUACIÓN/OFICIOS.CANTIDAD_DE_PUNTUACIONES) IN (SELECT MAX(OFICIOS.PUNTUACIÓN/OFICIOS.CANTIDAD_DE_PUNTUACIONES) FROM OFICIOS WHERE  OFICIOS.PROFESIONAL_idPROFESIONAL IN (SELECT PROFESIONALES.idPROFESIONAL FROM PROFESIONALES WHERE 111.1111 * DEGREES(
									ACOS(
										COS(RADIANS(".$lat.")) * COS(RADIANS(PROFESIONALES.LATITUD)) * COS(
											RADIANS(".$long.") - RADIANS(PROFESIONALES.LONGUITUD)
										) + SIN(RADIANS(".$lat.")) * SIN(RADIANS(PROFESIONALES.LATITUD))
									)
								) >0) GROUP BY OFICIOS.SERVICIOS_idSERVICIO)
							GROUP BY
								SERVICIOS.TIPO
							ORDER BY
								`puntuacion`
							DESC");
		if($query->execute()){
			$result=$query->fetchAll();
			$datos=array();
			foreach($result as $row){
				array_push($datos,[$row["idPROFESIONAL"],$row["NOMBRE"],$row["APELLIDO"],$row["FACLASS"],$row["FOTO_DE_PERFIL"],$row["PUNTUACIÓN"],$row["CANTIDAD_DE_PUNTUACIONES"],$row["TIPO"],$row["FACLASS"]]);
			}
			return $datos;
		}else{
			print_r($query->errorInfo());
			echo "Error con la consulta en la bd";
		}
		
	}
	
	public function conseguirlafotosdeloscontactos($idusuario,$paginacion,$limite){
		$con =new Conexion();
		$pag=(int)$paginacion;
		$lim=(int)$limite;
		$query=$con->prepare("SELECT GALERIA.ID_IMAGEN,GALERIA.IMAGEN,GALERIA.fecha,USUARIOS.FOTO_DE_PERFIL,USUARIOS.NOMBRE,USUARIOS.APELLIDO FROM GALERIA,USUARIOS,PROFESIONALES WHERE USUARIOS.idUSUARIO=PROFESIONALES.USUARIO_idUSUARIO AND GALERIA.PROFESIONAL_idPROFESIONAL=PROFESIONALES.idPROFESIONAL AND GALERIA.PROFESIONAL_idPROFESIONAL IN (SELECT CONTACTOS.idUSERPROFESIONAL FROM `CONTACTOS` WHERE CONTACTOS.idUSERCLIENTE=:userid) ORDER BY fecha DESC LIMIT :limite OFFSET :paginacion");
		$query->bindParam(':userid', $idusuario, PDO::PARAM_INT);
		$query->bindParam(':paginacion', $pag, PDO::PARAM_INT);
		$query->bindParam(':limite', $lim, PDO::PARAM_INT);
		if($query->execute()){
			$result=$query->fetchAll();
			$datos=array();
			foreach($result as $row){
				array_push($datos,[$row["ID_IMAGEN"],$row["fecha"],$row["IMAGEN"],$row["FOTO_DE_PERFIL"],$row["NOMBRE"],$row["APELLIDO"]]);
			}
			return $datos;
		}else{
			print_r($query->errorInfo());
			return false;
		}
	}


}






?>