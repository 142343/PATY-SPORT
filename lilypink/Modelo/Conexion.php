<?php
function Conectarse()
{
    $conexion = mysqli_connect('localhost', 'root', '', 'lily_pink');
    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }
    return $conexion;
}
