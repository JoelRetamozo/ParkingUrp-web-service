<?php

function getAll(){

	require_once '../modelo/M_Carrera.php';
	$m_carrera = new M_Carrera();

	$rspta = $m_carrera->getAll();

	$datos = Array();

	foreach ($rspta as $row) {
		$datos[] = $row;
	}
		echo json_encode($datos);
}

$metodo = $_REQUEST['metodo'];
$funcion = ejecutar($metodo);

function ejecutar($metodo){
	switch ($metodo) {
		case 'getAll':
			getAll();
			break;
		
		default:
			echo "No existe el metodo";
			break;
	}
}

?>