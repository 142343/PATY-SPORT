<?php
// Mostrar todos los errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conexión a la base de datos
$mysqli = new mysqli("localhost", "root", "", "paty_sport");
if ($mysqli->connect_errno) {
    die("Error al conectar: " . $mysqli->connect_error); // Mostrar error si falla la conexión
}

session_start(); // Iniciar sesión

// Verifica que el formulario haya sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar los datos del formulario
    $Num_Documento = $_POST['Num_Documento'] ?? '';
    $Password = $_POST['Password'] ?? '';

    // Validar que los campos no estén vacíos
    if (empty($Num_Documento) || empty($Password)) {
        echo "<script>
                alert('Por favor, completa todos los campos');
                window.location.href = 'InicioSesionIndex.html';
              </script>";
        exit();
    }

    // Consulta para obtener la contraseña encriptada de la base de datos
    $query = "SELECT AES_DECRYPT(Password, 'LANJ2024') AS PasswordDesencriptada FROM login WHERE Num_Documento = ?";
    $stmt = $mysqli->prepare($query);
    
    if (!$stmt) {
        echo "<script>
                alert('Error en la consulta a la base de datos');
                window.location.href = 'InicioSesionIndex.html';
              </script>";
        exit();
    }

    $stmt->bind_param("i", $Num_Documento);
    $stmt->execute();
    $stmt->store_result();

    // Si el número de documento existe
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($PasswordDesencriptada);
        $stmt->fetch();

        // Verificar si la contraseña desencriptada coincide
        if ($Password === $PasswordDesencriptada) {
            $_SESSION['login'] = $Num_Documento;
            echo "<script>
                    alert('Inicio de sesión exitoso');
                    window.location.href = '../opciones.php';
                  </script>";
            exit();
        } else {
            // Contraseña incorrecta
            echo "<script>
                    alert('Contraseña incorrecta');
                    window.location.href = 'InicioSesionIndex.html';
                  </script>";
            exit();
        }
    } else {
        // Documento no encontrado
        echo "<script>
                alert('Usuario no encontrado');
                window.location.href = 'InicioSesionIndex.html';
              </script>";
        exit();
    }

    $stmt->close();
}

$mysqli->close();
?>
