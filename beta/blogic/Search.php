<?php
include_once('cdata/datasearch.php');
	class b_Search{
		
		
		public function buscarServicios($arrayServicios,$lat,$long){
			$busqueda=new d_search;
			if($resultados=$busqueda->buscarServiciosSinFiltro($arrayServicios,$lat,$long)){
				$resultadosfiltrados=[];
				foreach($resultados as $resultado){
					
					
					if(false !== $key = array_search($resultado[0],array_column($resultadosfiltrados,0))){
						array_push($resultadosfiltrados[$key][6],$resultado[6][0]);
						array_push($resultadosfiltrados[$key][5],$resultado[5][0]);
						array_push($resultadosfiltrados[$key][4],$resultado[4][0]);
						array_push($resultadosfiltrados[$key][7],$resultado[7][0]);
						
						
					}else{
						array_push($resultadosfiltrados,$resultado);
						
					}
					
				}
				
				
				return $resultadosfiltrados;
			}else{
				return false;
			}
		}
		
	}












?>