<?php
//patysport90@gmail.com
//q f b d w v r h r a d k v j b y
// Mostrar todos los errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$mysqli = new mysqli("localhost", "root", "", "paty_sport");
if ($mysqli->connect_errno) {
    die("Error al conectar: " . $mysqli->connect_error);
}

$correo = $_POST['correo'];
$sql = "SELECT * FROM `usuario` WHERE correo = '$correo' AND `EstadoCodigoEstado` = 101;";
$resultado = $mysqli->query($sql);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

if (isset($_POST['submitContact'])) {

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'patysport90@gmail.com';                     //SMTP username
    $mail->Password   = 'qfbdwvrhradkvjby';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption ENCRYPTION_SMTPS
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::`

    //Recipients
    $mail->setFrom('patysport90@gmail.com', 'Paty Sport');
    if ($resultado && $resultado->num_rows > 0) {
        // Si se encuentra el correo en la base de datos, añadirlo como destinatario
        $mail->addAddress($correo);  // Se añade el correo del usuario
    } else {
        header("Location: ../Inicio/InicioSesionIndex.html?message=Usuario no encontrado");
        exit;
    }

    // Generar un enlace único para el restablecimiento de la contraseña
        $token = bin2hex(random_bytes(16));  // Token único para la seguridad (se puede guardar en la base de datos)
        $expiry = date("Y-m-d H:i:s", strtotime("+1 hour")); // Expira en 1 hora


// Guardar el token en la base de datos
$sqlToken = "UPDATE login
INNER JOIN usuario ON login.Num_Documento = usuario.Num_Documento
SET login.token = ?, login.token_expiry = ?
WHERE usuario.correo = ?";

// Preparar la consulta
$stmt = $mysqli->prepare($sqlToken);
$stmt->bind_param('sss', $token, $expiry, $correo);

 // Ejecutar la consulta
 if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        // Token actualizado exitosamente, continuar con el envío del correo
        $url = "http://localhost/Boostrap/Inicio/contrase%C3%B1a%20nueva.php?token=" . $token;

    // Contenido del correo
    $mail->isHTML(true);                                  // Establecer el formato del correo a HTML
    $mail->Subject = 'Cambiar contraseña';
    $mail->Body = '
        <h3>Hola, has solicitado recuperar tu contraseña.</h3>
        <p>Haz clic en el siguiente enlace para restablecer tu contraseña:</p>
        <a href="' . $url . '" target="_blank">Restablecer mi contraseña</a>
        <p>Si no solicitaste este cambio, ignora este correo.</p>
    ';

    $mail->send();
    header("Location: ../Inicio/InicioSesionIndex.html?message=ok");
    }}
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>