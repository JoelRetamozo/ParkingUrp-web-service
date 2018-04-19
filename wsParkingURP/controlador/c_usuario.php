<?php

function prueba(){
	$bienvenida = $_REQUEST['bienvenida'];

	echo "holi" . $bienvenida;
}

function login(){
	$codigo = $_REQUEST['codigo'];
	$password = $_REQUEST['password'];

	$rspta = $m_usuario->login($codigo, $password);

	$datos = array();

	foreach ($rspta->fetch_object() as $row) {
		$datos[] = $row;
	}

	echo json_encode($datos);
}

function getAll(){

	require_once '../modelo/M_Usuario.php';
	$m_usuario = new M_Usuario();

	$rspta = $m_usuario->getAll();

	$datos = Array();

	foreach ($rspta as $row) {
		$datos[] = $row;
	}
		echo json_encode($datos);
}

/*-------------------------------------------------------------------------
- Apartir de aqui van los metodos a ejecutar.

- Luego agregar en el metodo ejecutar dentro del switch case.

- Como ejecutar el metodo?

	http://localhost:82/wsParkingURP/controlador/(controlador.php)?metodo=(metodo_a_ejecutar)&(parametros) 

	Ejemplo ejecutar el metodo prueba:

	http://localhost:82/wsParkingURP/controlador/c_usuario.php?metodo=prueba&bienvenida=saludos 
*/

$metodo = $_REQUEST['metodo'];
$funcion = ejecutar($metodo);

function ejecutar($metodo){
	switch ($metodo) {
		case 'login':
			login();
			break;

		case 'prueba':
			prueba();
			break;

		case 'getAll':
			getAll();
			break;
		
		default:
			echo "No existe el metodo";
			break;
	}
}

?>