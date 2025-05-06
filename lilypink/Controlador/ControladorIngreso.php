<?php  
require_once '../Modelo/Ingreso.php';  

$gestorIngreso = new Ingreso();  

$elegirAcciones = isset($_POST['Acciones']) ? $_POST['Acciones'] : "Cargar";  

try {
    // Agregar Ingreso
    if ($elegirAcciones == 'Agregar Ingreso') {  
        if (
            isset($_POST['FechaIngresoProducto']) && 
            isset($_POST['ProductoCodigoProducto']) && 
            isset($_POST['Cantidad']) && 
            isset($_POST['Descripción']) && 
            isset($_POST['PrecioIngreso']) && 
            isset($_POST['Empleado'])
        ) {
            $ProductoCodigoProducto = $_POST['ProductoCodigoProducto'];
            
            // Verificar si el producto existe antes de agregar el ingreso
            $productoExiste = $gestorIngreso->verificarProductoExistente($ProductoCodigoProducto);
            if (!$productoExiste) {
                throw new Exception("El producto con código $ProductoCodigoProducto no existe.");
            }

            // Agregar ingreso
            $gestorIngreso->agregarIngreso(  
                $_POST['FechaIngresoProducto'],  
                $ProductoCodigoProducto,  
                $_POST['Cantidad'],
                $_POST['Descripción'],
                $_POST['PrecioIngreso'],    
                $_POST['Empleado'] 
            );
            header("Location: ../Controlador/ControladorIngreso.php");
        } else {
            throw new Exception("Faltan datos para agregar ingreso");
        }
    } 

    // Buscar Ingreso
    elseif ($elegirAcciones == 'Buscar Ingreso') {  
        if (isset($_POST['idTicketIngreso'])) {
            $resultado = $gestorIngreso->consultaringreso($_POST['idTicketIngreso']);  
        } else {
            throw new Exception("Falta el ID del ingreso a buscar");
        }
    }

    // Consultar todos los ingresos si no se especifica acción
    $resultado = $gestorIngreso->consultaringreso(); 

} catch (Exception $e) {  
    echo "Error: " . $e->getMessage();  
}  

include "../Vista/VistaIngreso.php";  
?>
