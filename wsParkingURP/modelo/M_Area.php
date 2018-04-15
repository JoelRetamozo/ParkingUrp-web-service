<?php

require '../config/Conexion.php';

/**
* 
*/
class M_Area
{
	
	function __construct(){
	}

	public function getAll(){
		$sql = "SELECT * FROM T_Area";
		return ejecutarConsulta($sql);
	}
}

?>