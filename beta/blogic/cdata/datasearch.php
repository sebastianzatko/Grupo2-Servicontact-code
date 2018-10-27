<?php
require_once('conexion/conectionpdo.php');
	class d_search{
		
		public function buscarServiciosSinFiltro($arrayServicios,$lat,$long){
			$con = new Conexion();
			session_start(); //la idea es que no muestre resultados con la misma id de sesion , pero crashea al habiltiarlo
			$servicios="";
			$arrayServicios=json_decode($arrayServicios);
			foreach($arrayServicios as $idservicio){
				if($arrayServicios[count($arrayServicios)-1] == $idservicio){
					$servicios=$servicios." OFICIOS.SERVICIOS_idSERVICIO= ".$idservicio." ";
				}else{
					$servicios=$servicios." OFICIOS.SERVICIOS_idSERVICIO= ".$idservicio." OR ";
				}
				
			}
			$idusuario="";
			if(isset($_SESSION["id"])){
			    $idusuario=" AND USUARIOS.idUSUARIO!=".(string)$_SESSION["id"]." ";
			}
			
			$sql="SELECT
						USUARIOS.idUSUARIO,
						USUARIOS.NOMBRE,
						USUARIOS.APELLIDO,
						USUARIOS.FOTO_DE_PERFIL,
						OFICIOS.PUNTUACIÓN,
						OFICIOS.CANTIDAD_DE_PUNTUACIONES,
						SERVICIOS.TIPO,
						SERVICIOS.FACLASS,
						(
                            ACOS(
                                SIN(".$lat.") * SIN(PROFESIONALES.LATITUD) + COS(".$lat.") * COS(PROFESIONALES.LATITUD) * COS(PROFESIONALES.LONGUITUD -(".$long."))
                            ) * 6371
                        ) AS DISTANCIA
					FROM
						USUARIOS,
						OFICIOS,
						PROFESIONALES,
						SERVICIOS
					WHERE
						USUARIOS.idUSUARIO = PROFESIONALES.USUARIO_idUSUARIO AND OFICIOS.PROFESIONAL_idPROFESIONAL = PROFESIONALES.idPROFESIONAL AND OFICIOS.SERVICIOS_idSERVICIO = SERVICIOS.idSERVICIO AND(
							".$servicios."
						) AND OFICIOS.HABILITADO=1".$idusuario."
						ORDER BY
                            ACOS(
                                SIN(".$lat.") * SIN(PROFESIONALES.LATITUD) + COS(".$lat.") * COS(PROFESIONALES.LATITUD) * COS(PROFESIONALES.LONGUITUD -(".$long."))
                            ) * 6371
                        DESC";
			$query = $con->prepare($sql);
			if($query->execute()){
				$result = $query->fetchAll();
				$datos = array();
				foreach($result as $row){
					array_push($datos,[$row['idUSUARIO'],$row['NOMBRE'],$row['APELLIDO'],$row['FOTO_DE_PERFIL'],[$row['PUNTUACIÓN']],[$row['CANTIDAD_DE_PUNTUACIONES']],[$row['TIPO']],[$row['FACLASS']],$row['DISTANCIA']]);
				}
				return $datos;
			}else{
				return false;
			}
		}
		
		
	}














?>