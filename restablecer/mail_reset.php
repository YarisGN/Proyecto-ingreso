<?php
$email = $_POST["email"];

$body = "Email: " . $email. 

// Varios destinatarios
$para  =$email . ', '; // atención a la coma
//$para .= 'wez@example.com';

// título
$título = 'Restablecer password';
$codigo= rand(1000,9999);


// mensaje
$mensaje = '
<html>
<head>
  <title>Restablecer</title>
</head>
<body>
    <h1>Nombre</h1>
    <div style="text-align:center; background-color:#ccc">
        <p>Restablecer contraseña</p>
        <h3>'.$codigo.'</h3>
        <p> <a 
            href="http://localhost/Proyecto-ingreso/reset.php?email='.$email.'&token='.$token.'"> 
            para restablecer da click aqui </a> </p>
        <p> <small>Si usted no envio este codigo favor de omitir</small> </p>
    </div>
</body>
</html>
';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer\Exception.php';
require 'PHPMailer\Exception.php';
require 'PHPMailer\SMTP.php';

$email = new PHPMailer(true);
try {
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host ='smtp.gmail.com';

    $mail->SMTPAuth = true;
    $mail->Username = 'micorreo';
    $mail->password = 'clave';
    $mail->SMTPSecure ='tls';

    $mail->Port = 25;

    $mail->setFrom('micorreo','Yaris');
    $mail->addAddress('yarisgomez255@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'Hola estoy enviando el correo desde local host';
    $mail->Body = 'Segundo correo de prueba';

    $mail->send();
    echo 'El mensaje se envio correctamente';

} catch (Exception $e) {
    echo 'Hubo un error al enviar el mensaje: ', $mail->ErrorInfo;
}

?>