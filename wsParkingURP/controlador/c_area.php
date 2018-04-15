<?php

function getAll(){

	require_once '../modelo/M_Area.php';
	$m_area = new M_Area();

	$rspta = $m_area->getAll();

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