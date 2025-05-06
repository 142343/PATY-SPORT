<?php  
require_once '../Modelo/Usuario.php';  

$gestorUsuario = new Usuario();  


$rol = $gestorUsuario->ConsultarRol();  
$estado = $gestorUsuario->ConsultarEstado();  
$genero = $gestorUsuario->ConsultarGenero();  


// Editar  
$roles = $gestorUsuario->ConsultarRol();  
$estados = $gestorUsuario->ConsultarEstado();  
$generos = $gestorUsuario->ConsultarGenero();  
 


$elegirAcciones = isset($_POST['Acciones']) ? $_POST['Acciones'] : "Cargar";  

try {
    if ($elegirAcciones == 'AgregarUsuario') {  
        $gestorUsuario->agregarUsuario(  
            $_POST['Tipo_Documento'],  
            $_POST['Num_Documento'],  
            $_POST['Nombres'],  
            $_POST['Apellidos'],  
            $_POST['Teléfono'],  
            $_POST['Correo'],  
            $_POST['RolidRol'],  
            $_POST['EstadoCodigoEstado'],  
            $_POST['GeneroidGenero'], 
        );
    } elseif ($elegirAcciones == 'ActualizarUsuario') {  
        
       $gestorUsuario->actualizarUsuario(  
        $_POST['Tipo_Documento'],  
        $_POST['Num_Documento'],  
        $_POST['Nombres'],  
        $_POST['Apellidos'],  
        $_POST['Teléfono'],  
        $_POST['Correo'],  
        $_POST['RolidRol'],  
        $_POST['EstadoCodigoEstado'],  
        $_POST['GeneroidGenero'],   
);

    } 

  
    $resultado = $gestorUsuario->consultarUsuario(); 
} catch (Exception $e) {  
   
    echo "Error: " . $e->getMessage();  
}  

include "../Vista/VistaUsuario.php";  
?>
