<?php

require '../config/Conexion.php';

class M_Vehiculo
{
    function __construct(){

    }

    //Nos mostrara los vehiculos por conductor, filtro en tipo de vehiculo y codigo conductor
    public function selectVehiculoPersona($codigo, $tipoV)
    {
        $sql = "SELECT t_vehiculo.placa, t_vehiculo.descripcion, t_vehiculo.estado FROM t_vehiculo INNER JOIN t_persona_has_t_vehiculo on t_vehiculo.id_vehiculo = t_persona_has_t_vehiculo.id_vehiculo INNER JOIN t_persona on t_persona.id_persona = t_persona_has_t_vehiculo.id_persona WHERE t_persona.codigo = '$codigo' AND t_vehiculo.tipo_vehiculo = '$tipoV'";
        return ejecutarConsulta($sql);
    }

    //Nos mostrara los datos del vehiculo filtrado por placa y tipo de vehiculo
    public function selectDataVehiculo($placa, $tipoV)
    {
        $sql = "SELECT * FROM ws_vehiculo WHERE placa = '$placa' AND tipo_vehiculo = '$tipoV'";
        return ejecutarConsulta($sql);
    }
}

?>