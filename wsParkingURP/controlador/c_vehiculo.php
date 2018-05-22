<?php


//1)http://localhost:8080/ParkingUrpWS/wsParkingURP/controlador/c_vehiculo.php?metodo=getVehiculosPersona&codigo=201411545&tipoV=Auto
function getVehiculosPersona()
{
    require_once '../modelo/M_Vehiculo.php';
    $m_vehiculo = new M_Vehiculo();
    
    $codigo = $_REQUEST['codigo'];
    $tipoV = $_REQUEST['tipoV'];
    
    $rspta = $m_vehiculo->selectVehiculoPersona($codigo, $tipoV);

    $datos = Array();

	foreach ($rspta as $row) {
		$datos[] = $row;
	}
	echo json_encode($datos);
}

//2)http://localhost:8080/ParkingUrpWS/wsParkingURP/controlador/c_vehiculo.php?metodo=getVehiculosPersona&codigo=201411545&tipoV=Auto
function getDataVehiculo()
{
    require_once '../modelo/M_Vehiculo.php';
    $m_vehiculo = new M_Vehiculo();
    
    $placa = $_REQUEST['placa'];
    $tipoV = $_REQUEST['tipoV'];
    
    $rspta = $m_vehiculo->selectDataVehiculo($placa, $tipoV);

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
		case 'getVehiculosPersona':
            getVehiculosPersona();
            break;
        case 'getDataVehiculo':
            getDataVehiculo();
            break;

		default:
			echo "No existe el metodo";
			break;
	}
}




?>