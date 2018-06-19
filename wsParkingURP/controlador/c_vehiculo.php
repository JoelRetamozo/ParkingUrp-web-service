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

function registrarTvehiculo()
{
    require_once '../modelo/M_Vehiculo.php';
    $m_vehiculo = new M_Vehiculo();
    
    $placa = $_REQUEST['placa'];
    $tipoV = $_REQUEST['tipoV'];
    
    $rspta = $m_vehiculo->registrarTVehiculo($placa,$tipoV);

    $datos = Array();

	echo json_encode("Registro exitosa.");
}

function registrarVehiculoPersona()
{
    require_once '../modelo/M_Vehiculo.php';
    $m_vehiculo = new M_Vehiculo();
    
    $placa = $_REQUEST['placa'];
    $codigo = $_REQUEST['codigo'];
    
    $rspta = $m_vehiculo->registrarVehiculoPersona($placa,$codigo);

    $datos = Array();

	echo json_encode("Registro exitosa.");
}

function getSiExisteConUser()
{
    require_once '../modelo/M_Vehiculo.php';
    $m_vehiculo = new M_Vehiculo();
    
    $placa = $_REQUEST['placa'];
    $codigo = $_REQUEST['codigo'];
    
    $rspta = $m_vehiculo->consultaVehiculoExisteUsuario($placa, $codigo);

    $datos = Array();

	foreach ($rspta as $row) {
		$datos[] = $row;
	}
	echo json_encode($datos);
}

function registrarBicicleta()
{
    require_once '../modelo/M_Vehiculo.php';
    $m_vehiculo = new M_Vehiculo();
    
    $placa = $_REQUEST['placa'];
    $descripcion=$_REQUEST['descripcion'];
    $estado=$_REQUEST['estado'];
    $tipo_vehiculo=$_REQUEST['tipo_vehiculo'];
    
    $rspta = $m_vehiculo->insertBicicleta($placa,$descripcion,$estado,$tipo_vehiculo);

    $datos = Array();

    echo json_encode("Registro exitoso");
}

function getBiciPorPersona()
{
    require_once '../modelo/M_Vehiculo.php';
    $m_vehiculo = new M_Vehiculo();
    
    $codigo = $_REQUEST['codigo'];
    $tipoV = $_REQUEST['tipoV'];
    
    $rspta = $m_vehiculo->selectBicicletaPorPersona($codigo, $tipoV);

    $datos = Array();

	foreach ($rspta as $row) {
		$datos[] = $row;
	}
	echo json_encode(array('vehiculos' => $datos));
}

function getControlNowSalidaNull()
{
    require_once '../modelo/M_Vehiculo.php';
    $m_vehiculo = new M_Vehiculo();
    
    $fecha = $_REQUEST['fecha'];
    $codigo = $_REQUEST['codigo'];
    
    $rspta = $m_vehiculo->getControlNow($fecha, $codigo);

    $datos = Array();

	foreach ($rspta as $row) {
		$datos[] = $row;
	}
	echo json_encode(array('control' => $datos));
}

function getPermanenciaByUser()
{
    require_once '../modelo/M_Vehiculo.php';
    $m_vehiculo = new M_Vehiculo();
    
    $codigo = $_REQUEST['codigo'];
    
    $rspta = $m_vehiculo->getPermanencia($codigo);

    $datos = Array();

	foreach ($rspta as $row) {
		$datos[] = $row;
	}
	echo json_encode(array('permanencia' => $datos));
}

function solicitarPermanencia()
{
    require_once '../modelo/M_Vehiculo.php';
    $m_vehiculo = new M_Vehiculo();
    
    $salida = $_REQUEST['salida'];
    $fq=$_REQUEST['flag_quedarse'];
    $motivo=$_REQUEST['motivo'];
    $id=$_REQUEST['id_control'];
    
    $rspta = $m_vehiculo->setPermanenciaConductor($salida, $fq, $motivo, $id);

    $datos = Array();

    echo json_encode("Registro exitoso");
}

function getAllec(){

    require_once '../modelo/M_Vehiculo.php';
    $m_vehiculo = new M_Vehiculo();

	$rspta = $m_vehiculo->getAllec();

	$datos = Array();

	foreach ($rspta as $row) {
		$datos[] = $row;
	}
		echo json_encode($datos);
}

//Eliminacion Vehiculo
function updateDeleteVehiculo()
{
    require_once '../modelo/M_Vehiculo.php';
    $m_vehiculo = new M_Vehiculo();
    
    $codigo = $_REQUEST['codigo'];
    $placa = $_REQUEST['placa'];

    
    $rspta = $m_vehiculo->updateToDeleteVehicle($codigo, $placa);

    $datos = Array();

    echo json_encode("Registro exitoso");
}

//----------------

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

        case 'registrarTvehiculo':
            registrarTvehiculo();
            break;

        case 'registrarVehiculoPersona':
            registrarVehiculoPersona();
            break;

        case 'getSiExisteConUser':
            getSiExisteConUser();
            break;

        case 'registrarBicicleta':
            registrarBicicleta();
            break;

        case 'getBiciPorPersona':
            getBiciPorPersona();
            break;

        case 'getControlNowSalidaNull':
            getControlNowSalidaNull();
            break;

        case 'getPermanenciaByUser':
            getPermanenciaByUser();
            break;

        case 'solicitarPermanencia':
            solicitarPermanencia();
            break;

        case 'getAllec':
            getAllec();
            break;

        case 'updateDeleteVehiculo':
        updateDeleteVehiculo();
        break;

		default:
			echo "No existe el metodo";
			break;
	}
}




?>