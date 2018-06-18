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

	public function getPerfil($codigo)
	{
		$sql = "SELECT * FROM t_persona WHERE codigo='$codigo'";
		return ejecutarConsulta($sql);
	}

	public function getPasswordUserByMail($correo)
	{
		$sql = "SELECT t_usuario.password FROM t_usuario INNER JOIN t_persona on t_usuario.codigo = t_persona.codigo WHERE t_persona.correo = '$correo'";
		return ejecutarConsulta($sql);
	}

	public function getPasswordUserByCodigo($pass, $code)
	{
		$sql = "SELECT IF( EXISTS(SELECT * FROM t_usuario WHERE password = '$pass' AND codigo = '$code'), 1, 0) as valid ";
		return ejecutarConsulta($sql);
	}

	public function updatePassword($pass, $code)
	{
		$sql = "UPDATE t_usuario set password = '$pass'  WHERE codigo = '$code'";
		return ejecutarConsulta($sql);
	}
}

?>