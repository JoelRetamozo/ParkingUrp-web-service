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
	echo json_encode(array('vehiculos' => $datos));
}

//http://localhost:8080/ParkingUrpWS/wsParkingURP/controlador/c_vehiculo.php?metodo=getCountVehiculo&codigo=201411545&tipoV=Moto
function getCountVehiculo()
{
    require_once '../modelo/M_Vehiculo.php';
    $m_vehiculo = new M_Vehiculo();
    
    $codigo = $_REQUEST['codigo'];
    $tipoV = $_REQUEST['tipoV'];
    
    $rspta = $m_vehiculo->countVehiculoPersona($codigo, $tipoV);

    $datos = Array();

	foreach ($rspta as $row) {
		$datos[] = $row;
	}
	echo json_encode($datos);
}

//2)http://localhost:8080/ParkingUrpWS/wsParkingURP/controlador/c_vehiculo.php?metodo=getDataVehiculo&placa=HSB285&tipoV=Auto
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

function getCountVehiculoRegistrados()
{
    require_once '../modelo/M_Vehiculo.php';
    $m_vehiculo = new M_Vehiculo();
    
    $placa = $_REQUEST['placa'];
    
    $rspta = $m_vehiculo->countVehiculo($placa);

    $datos = Array();

	foreach ($rspta as $row) {
		$datos[] = $row;
	}
	echo json_encode($datos);
}

function deletePerVeh()
{
    require_once '../modelo/M_Vehiculo.php';
    $m_vehiculo = new M_Vehiculo();
    
    $placa = $_REQUEST['placa'];
    
    $rspta = $m_vehiculo->deletePersonaHasVehiculo($placa);

    $datos = Array();

	echo json_encode("Eliminacion exitosa.");
}

function deleteVeh()
{
    require_once '../modelo/M_Vehiculo.php';
    $m_vehiculo = new M_Vehiculo();
    
    $placa = $_REQUEST['placa'];
    
    $rspta = $m_vehiculo->deleteVehiculo($placa);

    $datos = Array();

	echo json_encode("Eliminacion exitosa.");
}


function deleteVehiculoUsuario()
{
    require_once '../modelo/M_Vehiculo.php';
    $m_vehiculo = new M_Vehiculo();
    
    $placa = $_REQUEST['placa'];
    $codigo = $_REQUEST['codigo'];
    
    $rspta = $m_vehiculo->deleteVehiculoPersona($placa,$codigo);

    $datos = Array();

	echo json_encode("Eliminacion exitosa.");
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
        case 'getCountVehiculo':
            getCountVehiculo();
            break;
        case 'getCountVehiculoRegistrados':
            getCountVehiculoRegistrados();
            break;
        case 'deletePerVeh':
            deletePerVeh();
            break;
        case 'deleteVeh':
            deleteVeh();
            break;
        case 'deleteVehiculoUsuario':
            deleteVehiculoUsuario();
            break;

		default:
			echo "No existe el metodo";
			break;
	}
}




?>