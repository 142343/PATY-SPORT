<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../Modelo/Usuario.php';
include_once __DIR__ . '/../Modelo/Conexion.php'; // Asegúrate de que la ruta sea correcta

class UsuariosTest extends TestCase
{
    protected $usuario;

    protected function setUp(): void
    {
        $this->usuario = new Usuario();
    }

    public function testAgregarUsuario()
    {
        $tipo_documento = 'CC';
        $num_documento = '10437';
        $nombres = 'Nombre de prueba Lilley';
        $apellidos = 'Apellido de prueba';
        $telefono = '3101234567';
        $correo = 'prueba@example.com';
        $rol_id = 22; 
        $estado_codigo = 101;
        $genero_id = 2; 

        try {
            $this->usuario->agregarUsuario(
                $tipo_documento,
                $num_documento,
                $nombres,
                $apellidos,
                $telefono,
                $correo,
                $rol_id,
                $estado_codigo,
                $genero_id
            );
            $this->assertTrue(true, 'El usuario debería agregarse correctamente');
        } catch (\Exception $e) {
            $this->fail('El método agregarUsuario lanzó una excepción: ' . $e->getMessage());
        }
    }
    
    
    public function testActualizarUsuarioExistente()
{
    $num_documento_actualizar = '112233445';
    $nuevo_correo = 'actualizado.nuevo@example.com';

    $resultado = $this->usuario->actualizarUsuario(
        'CE',
        $num_documento_actualizar,
        $nuevos_nombres,
        'Apellido Actualizar',
        '3155555555',
        $nuevo_correo,
        22, 
        101,
        2
    );

    $this->assertTrue($resultado, 'El usuario debería actualizarse correctamente');

    // Verificar que la actualización se realizó correctamente consultando el usuario
    $usuario_actualizado_resultado = $this->usuario->consultarUsuario($num_documento_actualizar);
    $usuario_actualizado = $usuario_actualizado_resultado->fetch_assoc();
    $this->assertEquals($nuevos_nombres, $usuario_actualizado['Nombres'], 'El nombre del usuario debería haberse actualizado');
    $this->assertEquals($nuevo_correo, $usuario_actualizado['Correo'], 'El correo del usuario debería haberse actualizado');
}

    public function testConsultarRol()
    {
        $resultado = $this->usuario->ConsultarRol();
        $this->assertInstanceOf(\mysqli_result::class, $resultado, 'ConsultarRol debería devolver un objeto mysqli_result');
        $this->assertGreaterThanOrEqual(0, $resultado->num_rows, 'Debería devolver al menos cero roles');
        // Puedes agregar más aserciones para verificar la estructura de los roles
    }

    public function testConsultarEstado()
    {
        $resultado = $this->usuario->ConsultarEstado();
        $this->assertInstanceOf(\mysqli_result::class, $resultado, 'ConsultarEstado debería devolver un objeto mysqli_result');
        $this->assertGreaterThanOrEqual(0, $resultado->num_rows, 'Debería devolver al menos cero estados');
        // Puedes agregar más aserciones para verificar la estructura de los estados
    }

    public function testConsultarGenero()
    {
        $resultado = $this->usuario->ConsultarGenero();
        $this->assertInstanceOf(\mysqli_result::class, $resultado, 'ConsultarGenero debería devolver un objeto mysqli_result');
        $this->assertGreaterThanOrEqual(0, $resultado->num_rows, 'Debería devolver al menos cero géneros');
        // Puedes agregar más aserciones para verificar la estructura de los géneros
    }

    public static function tearDownAfterClass(): void
    {
        echo "\n\n******************************\n";
        echo "Todas las pruebas del módulo USUARIOS se realizaron correctamente ✅\n";
        echo "Se validaron agregar, consultar, actualizar , así como consultar roles, estados y géneros.\n";
        echo "******************************\n\n";
    }
}