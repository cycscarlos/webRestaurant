<?php
$nombre =$_POST["nombre"];
$nombre =$_POST["correo"];
$nombre =$_POST["telefono"];
$nombre =$_POST["mensaje"];

$body ="nombre: " . $ nombre . "<br>Correo: " . $correo. "<br>Teléfono: " . $telefono . "<br>Mensaje: " . $mensaje;

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                        // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'cycs.instalacion@gmail.com.com';                     // SMTP username
    $mail->Password   = 'best0002';                               // SMTP password
    $mail->SMTPSecure = tls;                                     // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('cycs.instalacion@gmail.com', '$nombre');
    $mail->addAddress('cycs.ingenieria@gmail.com');             // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is // optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                        // Set email format to HTML
    $mail->Subject = 'Prueba de PHPMailer para envio de Correos desde un Website';
    $mail->Body    = '$body';
    $mail->CharSet = 'UTF-8';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<script>
            alert("El mensaje se envió correctamente");
            window.history.go(-1);
          </script>;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}