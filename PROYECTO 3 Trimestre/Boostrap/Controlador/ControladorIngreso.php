<?php  
require_once '../Modelo/Ingreso.php';  

$gestorIngreso = new Ingreso();  


$idTicketIngreso = $gestorIngreso->idTicketIngreso();  
$FechaIngresoProducto = $gestorIngreso->FechaIngresoProducto();  
$PrecioUnitario = $gestorIngreso->PrecioUnitario();  
$PrecioTotal = $gestorIngreso->PrecioTotal();  


// Editar  
 


$elegirAcciones = isset($_POST['Acciones']) ? $_POST['Acciones'] : "Cargar";  

try {
    if ($elegirAcciones == 'agregar Ingreso') {  
        $gestorIngreso->agregarIngreso(  
            $_POST['idTicketIngreso'],  
            $_POST['FechaIngresoProducto'],  
            $_POST['PrecioUnitario'],  
            $_POST['PrecioTotal'],  
         
        );
    } elseif ($elegirAcciones == 'Actualizar Ingreso') {  
        
       $gestorProducto->actualizarProducto(  
    $_POST['idTicketIngreso'],  
    $_POST['FechaIngresoProducto'],  
    $_POST['PPrecioUnitarioecio'],  
    $_POST['PrecioTotal'],  
    
);

    } elseif ($elegirAcciones == 'Borrar Ingreso') {  
        $gestorIngreso->borrarIngreso($_POST['idTicketIngreso']);  
    } elseif ($elegirAcciones == 'Buscar Ingreso') {  
        $resultado = $gestorProducto->consultarProducto($_POST['idTicketIngreso']);  
        
    }  

  
    $resultado = $gestorIngreso->consultaringreso(); 
} catch (Exception $e) {  
   
    echo "Error: " . $e->getMessage();  
}  

include "../Vista/VistaIngreso.php";  
?>
