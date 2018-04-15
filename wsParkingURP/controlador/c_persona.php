<?php


// Ejemplo GET: 
//    http://localhost:82/wsParkingURP/controlador/c_persona.php?metodo=insertar&codigo=201413124&nombre=Ramon&ape_paterno=Ramirez&ape_materno=Ramos&celular=987654321&correo=dcb@gmail.com&id_tipo_persona=1&id_carrera=1

//El POST ya busca xD

function insertar(){

	require_once '../modelo/M_Persona.php';
	$m_persona = new M_Persona();

	$codigo = $_REQUEST['codigo'];
	$nombre = $_REQUEST['nombre'];
	$ape_paterno = $_REQUEST['ape_paterno'];
	$ape_materno = $_REQUEST['ape_materno'];
	$celular = $_REQUEST['celular'];
	$correo = $_REQUEST['correo'];
	$id_tipo_persona = $_REQUEST['id_tipo_persona'];
	$id_carrera = $_REQUEST['id_carrera'];

	$rspta = $m_persona->insertar($codigo, $nombre, $ape_paterno, $ape_materno, $celular, $correo, $id_tipo_persona, $id_carrera);

	echo json_encode("Registro exitoso.");
}

function existeCodigo(){
	require_once '../modelo/M_Persona.php';
	$m_persona = new M_Persona();

	$codigo = $_REQUEST['codigo'];

	$rspta = $m_persona->existeCodigo($codigo);

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
		case 'insertar':
			insertar();
			break;

		case 'existeCodigo':
			existeCodigo();
			break;
		
		default:
			echo "No existe el metodo";
			break;
	}
}

?>