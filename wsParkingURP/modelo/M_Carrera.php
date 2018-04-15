<?php

require '../config/Conexion.php';

/**
* 
*/
class M_Carrera
{
	
	function __construct(){
	}

	public function getAll(){
		$sql = "SELECT * FROM T_Carrera";
		return ejecutarConsulta($sql);
	}
}

?>