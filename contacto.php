<?php
//Librerías para el envío de mail
include_once('class.phpmailer.php');
include_once('class.smtp.php');
 
//Recibir todos los parámetros del formulario
$nombre = $_POST['contactName'];
$email = $_POST['contactEmail'];
$telefono = $_POST['contactPhone'];
$asunto = $_POST['contactSubject'];
$mensaje = $_POST['contactMessage'];



//Este bloque es importante
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
//$mail->SMTPSecure = "ssl";
$mail->Host = "mail.quepachuca.com.mx";
$mail->Port = 587;
 
//Nuestra cuenta
$mail->Username ='contacto@quepachuca.com.mx';
$mail->Password = 'may1409'; //Su password
 
//Agregar destinatario
$mail->AddAddress("contacto@quepachuca.com.mx");
$mail->Subject = $asunto;
$mail->Body =  $nombre;
 
//Para adjuntar archivo
//$mail->AddAttachment($archivo['tmp_name'], $archivo['name']);
$mail->MsgHTML("<b>$nombre</b> le ha enviado el siguiente mensaje:\n"
. "<br/>"
. "<b>Nombre:</b> $nombre<br/>"
. "<b>Email:</b> $email <br/>" 
. "<b>Telefono:</b> $telefono <br/>"
. "<b>Asunto:</b> $asunto<br/>"
. "<b>Mensaje:</b> $mensaje <br/>"
. "<br/>");


//Avisar si fue enviado o no y dirigir al index
if($mail->Send())
{
    echo'<script type="text/javascript">
        
            window.location="http://www.quepachuca.com.mx/gracias.html"
         </script>';
}
else{
    echo'<script type="text/javascript">
            
            window.location="http://www.quepachuca.com.mx/error.html"
         </script>';
}


?>