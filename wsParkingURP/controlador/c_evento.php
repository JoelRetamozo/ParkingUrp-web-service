<?php

function getAllEvento(){

	require_once '../modelo/m_evento.php';
	$m_evento = new m_evento();

	$rspta = $m_evento->getAllEvents();

	$datos = Array();

	foreach ($rspta as $row) {
		$datos[] = $row;
	}
    echo json_encode(array('evento' => $datos));
}

function getAreasPorEvento(){

	require_once '../modelo/m_evento.php';
	$m_evento = new m_evento();

	$idEvento = $_REQUEST['id_evento'];
    

	$rspta = $m_evento->getAreaPorEvento($idEvento);

	$datos = Array();

	foreach ($rspta as $row) {
		$datos[] = $row;
	}
    echo json_encode(array('areas' => $datos));
}

$metodo = $_REQUEST['metodo'];
$funcion = ejecutar($metodo);

function ejecutar($metodo){
	switch ($metodo) {
		case 'getAllEvento':
            getAllEvento();
			break;
		
		case 'getAreasPorEvento':
			getAreasPorEvento();
			break;

		default:
			echo "No existe el metodo";
			break;
	}
}

?>