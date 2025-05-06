<?php  
function Conectarse() {  
    $conexion = mysqli_connect('localhost', 'root', '', 'paty_sport', '3307');  
    if (!$conexion) {  
        die("Conexión fallida: " . mysqli_connect_error());  
    }  
    return $conexion;  
}  
?>