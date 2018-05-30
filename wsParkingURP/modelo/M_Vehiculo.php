<?php

require '../config/Conexion.php';

class M_Vehiculo
{
    function __construct(){

    }

    //Nos mostrara los vehiculos por conductor, filtro en tipo de vehiculo y codigo conductor
    public function selectVehiculoPersona($codigo, $tipoV)
    {
        $sql = "SELECT ws_vehiculo.placa, ws_vehiculo.marca, ws_vehiculo.color from ws_vehiculo INNER JOIN t_vehiculo on t_vehiculo.placa = ws_vehiculo.placa INNER JOIN t_persona_has_t_vehiculo on t_persona_has_t_vehiculo.placa = t_vehiculo.placa WHERE t_persona_has_t_vehiculo.codigo = '$codigo' AND t_vehiculo.tipo_vehiculo = '$tipoV'";
        return ejecutarConsulta($sql);
    }

    //Contador de vehiculos por tipo y codigo
    public function countVehiculoPersona($codigo, $tipoV)
    {
        $sql = "SELECT count(*) as cont from ws_vehiculo INNER JOIN t_vehiculo on t_vehiculo.placa = ws_vehiculo.placa INNER JOIN t_persona_has_t_vehiculo on t_persona_has_t_vehiculo.placa = t_vehiculo.placa WHERE t_persona_has_t_vehiculo.codigo = '$codigo' AND t_vehiculo.tipo_vehiculo = '$tipoV'";
        return ejecutarConsulta($sql);
    }

    //Nos mostrara los datos del vehiculo filtrado por placa y tipo de vehiculo
    public function selectDataVehiculo($placa, $tipoV)
    {
        $sql = "SELECT * FROM ws_vehiculo WHERE placa = '$placa' AND tipo_vehiculo = '$tipoV'";
        return ejecutarConsulta($sql);
    }

    //ver cuantas veces aparece vehiculo
    public function countVehiculo($placa)
    {
        $sql = "SELECT count(*) as contadorV FROM t_persona_has_t_vehiculo WHERE placa = '$placa'";
        return ejecutarConsulta($sql);
    }

    //eliminar en t_persona_has_t_vehiculo y vehiculo en caso el vehiculo solo este registrado en un solo usuario
    public function deletePersonaHasVehiculo($placa)
    {
        $sql = "DELETE FROM t_persona_has_t_vehiculo WHERE placa = '$placa'";
        return ejecutarConsulta($sql);
    }

    public function deleteVehiculo($placa)
    {
        $sql = "DELETE FROM t_vehiculo WHERE placa = '$placa'";
        return ejecutarConsulta($sql);
    }
    //-----------------------------------------------------

    //eliminar vehiculo a un usuario, en caso la placa ya este registrada en otro usuario
    public function deleteVehiculoPersona($placa, $codigo)
    {
        $sql = "DELETE FROM t_persona_has_t_vehiculo WHERE placa = '$placa' and codigo='$codigo'";
        return ejecutarConsulta($sql);
    }



}

?>