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
    
    public function getAreaPorEvento($idEvento)
    {
      $sql = "SELECT t_area.nombre from t_area INNER JOIN t_area_has_t_evento on t_area_has_t_evento.id_area = t_area.id_area INNER JOIN t_evento on t_area_has_t_evento.id_evento = t_evento.id_evento WHERE t_evento.id_evento = '$idEvento' AND t_evento.estado = 1 ";
      return ejecutarConsulta($sql);
    }
}


?>