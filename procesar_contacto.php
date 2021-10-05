<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/Exception.php";
require "PHPMailer/PHPMailer.php";
require "PHPMailer/SMTP.php";

$name = $_POST['nom'];
$email = $_POST['cor'];
$subject = $_POST['asu'];
$message = $_POST['men'];
    
$mail = new PHPMailer(); /* colocamos true para que pueda manejar excepciones */

$mail->SMTPDebug = 2; //version de debug smtp
$mail->isSMTP();    //enviar usando protocolo SMTP
$mail->Host       = 'smtp.office365.com';  //servidor SMTP, en mi caso de outlook
$mail->SMTPAuth   = true;  //Enable SMTP authentication
$mail->Username   = 'jordana_escalona@outlook.com'; //SMTP username
$mail->Password   = 'jordanita2020***'; //SMTP password
$mail->SMTPSecure = 'tls';//Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
$mail->Port       = 587; //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
//Recipients
$mail->setFrom('jordana_escalona@outlook.com', 'Portfolio contacto'); //de donde enviamos y mailer para que tome las credenciales del usuario
$mail->addAddress('jordana.escalona@gmail.com', 'Jordana Escalona'); //Add otra cuenta donde queramos enviar
//$mail->addAddress('ellen@example.com');               //Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
    
//Attachments
//$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
//Content
$mail->isHTML(true); //Set email format to HTML
$mail->Subject = 'Motivo de contacto: '.$subject;
$mail->Body    = '<h1>Nombre y apellido: ' . $name . '</h1><br><h2>Correo de contacto: ' . $email . '</h2><br><h3>Mensaje: </h3><p style="color:red;">'. $message .'</p>';
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
$mail->send();
$mail->smtpClose();
?>