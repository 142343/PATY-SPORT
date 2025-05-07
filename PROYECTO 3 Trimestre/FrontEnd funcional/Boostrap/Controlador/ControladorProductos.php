<?php  
require_once '../Modelo/Producto.php';  

$gestorProducto = new Producto();  


$categorias = $gestorProducto->ConsultarCategoria();  
$marcas = $gestorProducto->ConsultarMarcas();  
$tallas = $gestorProducto->ConsultarTallas();  
$estado = $gestorProducto->ConsultarEstados();  
$usuario = $gestorProducto->ConsultarUsuario();



// Editar  
$categoria = $gestorProducto->ConsultarCategoria();  
$estados = $gestorProducto->ConsultarEstados();
$marca = $gestorProducto->ConsultarMarcas();
$talla = $gestorProducto->ConsultarTallas();
$usuarios = $gestorProducto->ConsultarUsuario(); 


$elegirAcciones = isset($_POST['Acciones']) ? $_POST['Acciones'] : "Cargar";  

try {
    if ($elegirAcciones == 'Agregar Producto') {  
        $gestorProducto->agregarProducto(  
            $_POST['Nombre'],  
            $_POST['Precio'],  
            $_POST['Stock'],  
            $_POST['IVA'],  
            $_POST['CategoriaCodigoCategoría'],  
            $_POST['EstadoCodigoEstado'],  
            $_POST['Descripcion'],  
            $_POST['MarcasCodigoMarca'],  
            $_POST['TallasCodigoTallas'],  
            $_POST['Num_Documento']  
        );
    } elseif ($elegirAcciones == 'ActualizarProducto') {  
        
       $gestorProducto->actualizarProducto(  
    $_POST['CodigoProducto'],  
    $_POST['Nombre'],  
    $_POST['Precio'],  
    $_POST['Stock'],  
    $_POST['IVA'],  
    $_POST['CategoriaCodigoCategoría'],  
    $_POST['EstadoCodigoEstado'],  
    $_POST['Descripcion'],  
    $_POST['MarcasCodigoMarca'],  
    $_POST['TallasCodigoTallas'],  
    $_POST['Num_Documento']  
);

    } elseif ($elegirAcciones == 'Borrar Producto') {  
        $gestorProducto->borrarProducto($_POST['CodigoProducto']);  
    } elseif ($elegirAcciones == 'Buscar Producto') {  
        $resultado = $gestorProducto->consultarProducto($_POST['CodigoProducto']);  
        
    }  

  
    $resultado = $gestorProducto->consultarProducto(); 
} catch (Exception $e) {  
   
    echo "Error: " . $e->getMessage();  
}  



include "../Vista/VistaProducto.php";  



?>