<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if (isset($_POST['nombre'])) {
    
    $nombre = htmlentities($_POST['nombre'], ENT_QUOTES);
    $edad  = htmlentities($_POST['edad'], ENT_QUOTES);
    $correo  = htmlentities($_POST['correo'], ENT_QUOTES);
    $distrito  = htmlentities($_POST['distrito'], ENT_QUOTES);
    $telf   = htmlentities($_POST['telf'], ENT_QUOTES);
    $mensaje_usuario = htmlentities($_POST['mensaje'], ENT_QUOTES);

    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                   // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'mail.sobreellas.com';                  // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'envio@sobreellas.com';                 // SMTP username
        $mail->Password   = '14Sn*X;UF.0j';                         // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('rosamedrano90@outlook.es', 'Cytotec.online');
        $mail->addAddress('contacto@cytotec.online', 'Recibir Correo');    // Add a recipient   
    
        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');            // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');       // Optional name 
        
        
        $template  = "<table>";
        $template .= "<tr><td style='border-bottom: 1px solid; padding: 1rem;'><Strong>Nombre</Strong></td> <td style='border-bottom: 1px solid; padding: 1rem;'>$nombre</td> </tr>";
        $template .= "<tr><td style='border-bottom: 1px solid; padding: 1rem;'><Strong>Edad</Strong></td> <td style='border-bottom: 1px solid; padding: 1rem;'>$edad</td> </tr>";
        $template .= "<tr><td style='border-bottom: 1px solid; padding: 1rem;'><Strong>Correo</Strong></td> <td style='border-bottom: 1px solid; padding: 1rem;'>$correo</td> </tr>";
        $template .= "<tr><td style='border-bottom: 1px solid; padding: 1rem;'><Strong>Distrito</Strong></td> <td style='border-bottom: 1px solid; padding: 1rem;'>$distrito</td> </tr>";
        $template .= "<tr><td style='border-bottom: 1px solid; padding: 1rem;'><Strong>Celular</Strong></td> <td style='border-bottom: 1px solid; padding: 1rem;'>$telf</td> </tr>";
        $template .= "<tr><td style='border-bottom: 1px solid; padding: 1rem;'><Strong>Mensaje</Strong></td> <td style='border-bottom: 1px solid; padding: 1rem;'>$mensaje_usuario</td> </tr>";
        $template .= "</table>";
    
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Correo Desde - sobreellas.com - ' . date('d/m/y h:i:s A');
        $mail->Body    = $template;
        $mail->AltBody = "Nombre: $nombre;Correo: $correo;Celular: $telf;Mensaje: $mensaje_usuario";
    
        $mail->send();
        include 'envio-exito.html';
    } catch (Exception $e) {
        include 'envio-fallido.html';
    }

} else {
    include 'envio-fallido.html';
}
?>
