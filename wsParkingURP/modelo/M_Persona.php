<?php

require '../config/Conexion.php';

/**
* 
*/
class M_Persona
{
	
	function __construct(){
	}

	public function insertar($codigo, $nombre, $ape_paterno, $ape_materno, $celular, $correo, $id_tipo_persona, $id_carrera){
		$sql = "INSERT INTO T_Persona VALUES('','$codigo', '$nombre', '$ape_paterno', '$ape_materno', '$celular', '$correo', '$id_tipo_persona', '$id_carrera')";
		return ejecutarConsulta($sql);
	}

	public function existeCodigo($codigo){
		$sql = "SELECT COUNT(*) as cou FROM T_Usuario WHERE codigo = '$codigo'";
		return ejecutarConsulta($sql);
	}
}

?>