<?php

function registrarSugerencia()
{
    require_once '../modelo/M_Sugerencia.php';
    $m_sugerencia = new M_Sugerencia();
    
    $detalle = $_REQUEST['detalle'];
    $imagen = $_REQUEST['imagen'];
    $estado = $_REQUEST['estado'];
    $codigo = $_REQUEST['codigo'];

    $path = "imagenes/$detalle.png";
    
    file_put_contents($path, base64_decode($imagen));
    $bytesArchivo = file_get_contents($path);
    
    $rspta = $m_sugerencia->registrarSugerencia($detalle,$imagen,$estado,$codigo);

    $datos = Array();

	echo json_encode("Registro exitosa.");
}

$metodo = $_REQUEST['metodo'];
$funcion = ejecutar($metodo);

function ejecutar($metodo){
	switch ($metodo) {
		case 'registrarSugerencia':
            registrarSugerencia();
            break;
		default:
			echo "No existe el metodo";
			break;
	}
}




?>