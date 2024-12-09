<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function destroy($id)
    {
        try {
            // Find the product
            $product = Product::findOrFail($id);

            // Check if the product has an image and delete it from storage
            if ($product->Imagen) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($product->Imagen);
            }

            // Delete the product from the database
            $product->delete();

            return response()->json([
                'success' => true,
                'message' => 'Producto eliminado exitosamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el producto: ' . $e->getMessage()
            ], 500);
        }
    }
    
    public function getProductsByCategory($categoryName)
    {
        try {
            // Find the category by its name
            $category = \App\Models\Category::where('Nombre', $categoryName)->first();

            if (!$category) {
                return response()->json([
                    'message' => 'Categoría no encontrada',
                    'status' => 404
                ], 404);
            }

            // Retrieve products for the specific category
            $products = Product::where('CategoriaCodigoCategoría', $category->CodigoCategoría)->get();

            // Obtain dropdown lists
            $listas = (new Product())->obtenerListasCatalogos();

            return view('catalog.index', [
                'products' => $products,
                'categorias' => $listas['categorias'],
                'estados' => $listas['estados'],
                'marcas' => $listas['marcas'],
                'tallas' => $listas['tallas'],
                'usuario' => $listas['usuario'],
                'selectedCategory' => $categoryName
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage(), 
                'status' => 500
            ], 500);
        }
    }

    public function index()
    {
        try {
            // Obtener todos los productos
            $products = Product::all();

            // Obtener listas desplegables desde el modelo
            $listas = (new Product())->obtenerListasCatalogos();

            return view('catalog.index', [
                'products' => $products,
                'categorias' => $listas['categorias'],
                'estados' => $listas['estados'],
                'marcas' => $listas['marcas'],
                'tallas' => $listas['tallas'],
                'usuario' => $listas['usuario']
               
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }


    
    public function store(Request $request)
    {
        try {
            // Registro inicial para depuración
            info('Iniciando validación de datos', ['datos_recibidos' => $request->all()]);
    
            // Validación de datos
            $validated = $request->validate([
                'Nombre' => 'required|string|max:255',
                'Precio' => 'required|numeric',
                'IVA' => 'required|numeric',
                'Imagen' => 'nullable|image|max:2048',  // Imagen ya no es obligatorio
                'CategoriaCodigoCategoría' => 'required|exists:categoria,CodigoCategoría',
                'EstadoCodigoEstado' => 'required|exists:estado,CodigoEstado',
                'Stock' => 'required|numeric',
                'Descripcion' => 'nullable|string',
                'MarcasCodigoMarca' => 'required|exists:marcas,CodigoMarca',
                'TallasCodigoTallas' => 'required|exists:tallas,CodigoTallas',
                'Num_Documento' => 'required|exists:usuario,Num_Documento'
            ]);
    
            info('Validación completada exitosamente', ['datos_validados' => $validated]);
    
            // Procesar la imagen si existe
            if ($request->hasFile('Imagen')) {
                $imagen = $request->file('Imagen');
                $rutaImagen = $imagen->store('productos', 'public');
                info('Imagen cargada exitosamente', ['ruta_imagen' => $rutaImagen]);
                $validated['Imagen'] = $rutaImagen;  // Agregar ruta de imagen solo si se carga una imagen
            } else {
                // Si no se envió imagen, la ruta será nula
                $validated['Imagen'] = null;
            }
    
            // Guardar el producto en la base de datos
            $producto = (new Product())->agregarProducto($validated);
    
            info('Producto agregado correctamente', ['producto' => $producto]);
    
            // Responder con éxito
            return response()->json([
                'message' => 'Producto agregado exitosamente',
                'producto' => $producto
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Errores de validación específicos
            info('Errores de validación', ['errores' => $e->errors()]);
            return response()->json([
                'message' => 'Errores de validación',
                'errores' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            // Otros errores
            info('Error en el proceso de almacenamiento', ['error' => $e->getMessage()]);
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
    
    
    public function update(Request $request, $id)   
    {  
        info('Solicitud de actualización', [  
            'id' => $id,  
            'data' => $request->all()  
        ]);  

        try {  
            $product = Product::findOrFail($id);  
            $product->update($request->only([  
                'Nombre', 'Descripcion', 'Precio'
            ]));  
            
            return response()->json([  
                'success' => true,  
                'message' => 'Producto actualizado exitosamente',  
                'product' => $product  
            ]);  
        } catch (\Exception $e) {  
            return response()->json([  
                'success' => false,  
                'message' => 'Error: ' . $e->getMessage()  
            ], 500);  
        }  
    }  
    

    public function indexx()  
    {  
        $products = Product::all();  
        if ($products->isEmpty()) {  
            $data = [  
                'message' => 'No se encontraron Productos',  
                'status' => 200  
            ];  
            return response()->json($data, 200);  
        }  
        return response()->json($products, 200);  
    }  

    public function addToCart(Request $request)  
    {  
        $product = Product::findOrFail($request->product_id);  

        $cart = Session::get('cart', []);  

        if (isset($cart[$product->CodigoProducto])) {  
            $cart[$product->CodigoProducto]['cantidad']++;  
        } else {  
            $cart[$product->CodigoProducto] = [  
                'id' => $product->CodigoProducto,  
                'nombre' => $product->Nombre,  
                'precio' => $product->Precio,  
                'cantidad' => 1  
            ];  
        }  

        Session::put('cart', $cart);  

        return response()->json([  
            'message' => "Producto {$product->Nombre} agregado al carrito",  
            'cart_count' => count($cart)  
        ]);  
    }  

 
}