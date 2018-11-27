<?php
include_once('cdata/datawork.php');
class Works{

	function getnombre($id){
		$data_work = new datawork();
		$data = $data_work->getnombreapellido($id);
		return $data;
	}
	function getfinishedworks($idprofesional){
		$data_work = new datawork();
		$data = $data_work->getfinishedworks($idprofesional);
		return $data;
	}

	function getpendingworks($idprofesional){
		$data_work = new datawork();
		$data = $data_work->getpendingworks($idprofesional);
		return $data;
	}
}
?>