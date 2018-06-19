<?php

require '../config/Conexion.php';

class m_evento
{
    function __construct(){

    }

    public function getAllEvents()
    {
		$sql = "SELECT * FROM T_Evento where estado=1";
		return ejecutarConsulta($sql);
    }
    
}


?>