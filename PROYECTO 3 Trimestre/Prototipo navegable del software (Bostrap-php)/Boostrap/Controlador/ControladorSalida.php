<?php  
require_once '../Modelo/Salida.php';  

$gestorSalida = new Salida(); 

$elegirAcciones = isset($_POST['Acciones']) ? $_POST['Acciones'] : "Cargar";  

try {
    if ($elegirAcciones == 'Agregar Salida') {  
        $gestorSalida->agregarSalida(  
            $_POST['FechaSalida'],  
            $_POST['PrecioTotal']
        );
    } elseif ($elegirAcciones == 'Buscar Producto') {  
        $resultado = $gestorSalida->consultarSalida($_POST['CodigoProducto']);  
    }  

    $resultado = $gestorSalida->consultarSalida(); 
} catch (Exception $e) {  
    $errorMessage = "Error: " . $e->getMessage();  
}  

include "../Vista/VistaSalida.php";  
?>
