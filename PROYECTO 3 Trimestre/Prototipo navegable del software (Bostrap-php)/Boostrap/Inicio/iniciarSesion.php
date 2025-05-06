<?php
// Mostrar todos los errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$mysqli = new mysqli("localhost", "root", "", "paty_sport", "3307");
if ($mysqli->connect_errno) {
    die("Error al conectar: " . $mysqli->connect_error); // Mostrar error si falla la conexión
}

session_start(); // Iniciar sesión

// Verifica que el formulario haya sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar los datos del formulario
    $Num_Documento = $_POST['Num_Documento'];
    $Password = $_POST['Password'];

    // Mostrar los datos que se están enviando (puedes eliminar esto una vez que funcione)
    echo "Documento: " . $Num_Documento . "<br>";
    echo "Contraseña: " . $Password . "<br>";

    // Consulta para obtener la contraseña encriptada de la base de datos
    $query = "SELECT AES_DECRYPT(Password, 'LANJ2024') AS PasswordDesencriptada FROM login WHERE Num_Documento = ?";
    $stmt = $mysqli->prepare($query);
    
    if (!$stmt) {
        die("Error en la consulta: " . $mysqli->error); // Mostrar error de la consulta si falla
    }

    $stmt->bind_param("i", $Num_Documento); // 'i' porque es un entero
    $stmt->execute();
    $stmt->store_result();

    // Si el número de documento existe
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($PasswordDesencriptada);
        $stmt->fetch();

        // Verificar si la contraseña desencriptada coincide
        if ($Password === $PasswordDesencriptada) {
            // Credenciales correctas, iniciar sesión
            $_SESSION['login'] = $Num_Documento;
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sesión iniciada',
                    text: 'Las credenciales son correctas',
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then(function () {
                    window.location = "../opciones.html";
                });
            </script>
            <?php
        } else {
            // Contraseña incorrecta
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Contraseña incorrecta',
                    showConfirmButton: true,
                    confirmButtonText: "Devolver"
                }).then(function () {
                    window.location = "InicioSesionIndex.html";
                });
            </script>
            <?php
        }
    } else {
        // Documento no encontrado
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Usuario no encontrado',
                text: 'El documento no está registrado',
                showConfirmButton: true,
                confirmButtonText: "Devolver"
            }).then(function () {
                window.location = "InicioSesionIndex.html";
            });
        </script>
        <?php
    }

    $stmt->close();
}

$mysqli->close();
?>
