<?php

require '../config/Conexion.php';

/**
* 
*/
class M_Usuario
{
	
	function __construct(){
	}

	public function login($codigo, $password){
		$sql = "SELECT * FROM T_Usuario WHERE codigo='$codigo' AND password='$password'";

		return ejecutarConsultaSimpleFila($sql);
	}

	public function getAll(){
		$sql = "SELECT * FROM T_Usuario";
		return ejecutarConsulta($sql);
	}
}

?>