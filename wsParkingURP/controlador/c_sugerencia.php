<?php

$hostname_localhost = "localhost";
$database_localhost = "BD_ParkingURP";
$username_localhost = "root";
$password_localhost = "";

$conexion = mysqli_connect($hostname_localhost, $username_localhost, $password_localhost, $database_localhost);

$detalle = $_POST["detalle"];
$imagen = $_POST["imagen"];
$estado = $_POST["estado"];
$codigo = $_POST["codigo"];

$path = "imagenes/$detalle.jpg";

$url = "http://$hostname_localhost/wsParkingURP/controlador/$path";


if ($imagen != NULL)
{
    file_put_contents($path, base64_decode($imagen));
    $bytesArchivo = file_get_contents($path);

    $sql = "INSERT INTO t_sugerencia values (null,?,?,?,?)";
    $stm = $conexion->prepare($sql);
    $stm->bind_param('ssss',$detalle,$bytesArchivo,$estado,$codigo);
}
else
{
    $sql = "INSERT INTO t_sugerencia values (null,?,null,?,?)";
    $stm = $conexion->prepare($sql);
    $stm->bind_param('sss',$detalle,$estado,$codigo);
}


if($stm->execute())
{
    echo 'registra';
}else
{
    echo 'noRegistra';
}




?>