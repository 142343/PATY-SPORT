<?php  
require_once '../Modelo/Producto.php';  

$gestorProducto = new Producto();  
$gestorTalla = new Talla();  
$gestorMarca= new Marca();
$gestorCategoria= new Categoria();   


$categorias = $gestorProducto->ConsultarCategoria();  
$marcas = $gestorProducto->ConsultarMarcas();  
$tallas = $gestorProducto->ConsultarTallas();  
$estado = $gestorProducto->ConsultarEstados();  
$usuario = $gestorProducto->ConsultarUsuario();

$genero = $gestorCategoria->ConsultarGenero(); 

// Editar  
$categoria = $gestorProducto->ConsultarCategoria();  
$estados = $gestorProducto->ConsultarEstados();
$marca = $gestorProducto->ConsultarMarcas();
$talla = $gestorProducto->ConsultarTallas();
$usuarios = $gestorProducto->ConsultarUsuario(); 


$elegirAcciones = isset($_POST['Acciones']) ? $_POST['Acciones'] : "Cargar";  


try {
    if ($elegirAcciones == 'Agregar Categoria') {  
        $gestorCategoria->agregarCategoria(  
            $_POST['Nombre'],
            $_POST['GeneroidGenero']
        );
    } 

  
} catch (Exception $e) {  
   
    echo "Error: " . $e->getMessage();  
}  

try {
    if ($elegirAcciones == 'Agregar Marca') {  
        $gestorMarca->agregarMarca(  
            $_POST['Nombre']
        );
    } 

  
} catch (Exception $e) {  
   
    echo "Error: " . $e->getMessage();  
}  


try {
    if ($elegirAcciones == 'Agregar Talla') {  
        $gestorTalla->agregarTalla(  
            $_POST['Tallas']
        );
    } 

  
} catch (Exception $e) {  
   
    echo "Error: " . $e->getMessage();  
}  

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