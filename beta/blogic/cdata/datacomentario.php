<?php
require_once('conexion/conectionpdo.php');
class datacomentario{
	public function comentar($idusuario,$idpublicacion,$comentario){
		$con = new Conexion();
		$sql="INSERT INTO COMENTARIOS (COMENTARIO,CLIENTES_idCLIENTE,GALERIA_ID_IMAGEN) VALUES (?,?,?)";
		$query=$con->prepare($sql);
		$query->execute(array($comentario,$idusuario,$idpublicacion));
		return true;
		

	}
	public function obtenercomentarios($idpublicacion){
		$con = new Conexion();
		$sql="SELECT
					`COMENTARIOS`.`idCOMENTARIO`,
					`COMENTARIOS`.`COMENTARIO`,
					`COMENTARIOS`.`CLIENTES_idCLIENTE`,
					USUARIOS.FOTO_DE_PERFIL,
					USUARIOS.NOMBRE,
					USUARIOS.APELLIDO,
					`COMENTARIOS`.`FECHA`
				FROM
					`COMENTARIOS`,GALERIA,USUARIOS
				WHERE
					`COMENTARIOS`.GALERIA_ID_IMAGEN = GALERIA.ID_IMAGEN AND GALERIA.ID_IMAGEN = ? AND 
					COMENTARIOS.CLIENTES_idCLIENTE=USUARIOS.idUSUARIO";
		$query=$con->prepare($sql);
		if($query->execute(array($idpublicacion))){
			$result = $query->fetchAll();
			$datos = array();
			foreach($result as $row){
				array_push($datos,[$row["idCOMENTARIO"],$row["COMENTARIO"],$row["FOTO_DE_PERFIL"],$row["NOMBRE"],$row["APELLIDO"],$row["FECHA"]]);
			}
			return $datos;
		}else{
			print_r($query->errorInfo());
			return false;
		}
	}
}

?>