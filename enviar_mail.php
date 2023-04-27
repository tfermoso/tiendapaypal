<?php
use PHPMailer\PHPMailer\{PHPMailer,SMTP,Exception};

require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;//SMTP::DEBUG_SERVER; //SMTP::DEBUG_OFF                     //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = EMAILHOST;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = EMAILUSER;                     //SMTP username
    $mail->Password   = EMAILPASS;                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom(EMAILUSER, 'Tienda');
    $mail->addAddress($correo);     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo(EMAILUSER, 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Su pedido'.$cod_venta.' se ha completado';
    $mail->Body    = 'Este es el resumen de su pedido <strong>'.$cod_venta.'</strong><br>
    <p>'.json_encode($venta).'</p>';
    $mail->AltBody = 'Este es el resumen de su pedido <strong>'.$cod_venta.'</strong><br>
    <p>'.json_encode($venta).'</p>';

    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    exit();
}

