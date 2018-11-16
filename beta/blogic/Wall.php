<?php
include_once('cdata/datawall.php');
	class Wall{
		
		public function conseguirfotosdelosprofesionalesmasrateados(){
			$muro=new datawall();
			$datos=$muro->conseguirfotosmejoresdelosserviciosmejoresrateados();
			return $datos;
		}
		
		public function conseguirlascategoriasmasbuscadas(){
			$muro=new datawall();
			$datitos=$muro->conseguirserviciosmasbuscados();
			return $datitos;
		}
		
		public function conseguirlosmejoresprofesionalesdelazona($lat,$long){
			$muro=new datawall();
			$datos=$muro->conseguirlosmejoresprofesionalesdelazona($lat,$long);
			return $datos;
		}
		
		public function conseguirloslasfotosdeloscontactos($idusuario){
			$muro=new datawall();
			$datos=$muro->conseguirlafotosdeloscontactos($idusuario);
			return $datos;
		}
	}










?>