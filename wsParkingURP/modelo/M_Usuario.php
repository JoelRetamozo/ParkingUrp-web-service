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
		$sql = "SELECT COUNT(*) AS CONTADOR FROM T_Usuario WHERE codigo='$codigo' AND password='$password'";

		return ejecutarConsulta($sql);
	}

	public function insertarUsuario($codigo, $password)
	{
		$sql = "INSERT INTO t_usuario VALUES(null,'$codigo','$password',0,null,(SELECT `id_persona` FROM t_persona ORDER BY id_persona DESC LIMIT 1))";
		return ejecutarConsulta($sql);
	}

	public function getAll(){
		$sql = "SELECT * FROM T_Usuario";
		return ejecutarConsulta($sql);
	}
}

?>