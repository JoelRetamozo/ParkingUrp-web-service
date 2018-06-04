<?php

require '../config/Conexion.php';

class M_Sugerencia
{
    function __construct(){

    }

    public function registrarSugerencia($detalle, $imagen, $estado, $codigo)
    {
        $sql = "INSERT INTO t_sugerencia values(null,'$detalle','$imagen','$estado','$codigo')";
        return ejecutarConsulta($sql);
    }

}

?>