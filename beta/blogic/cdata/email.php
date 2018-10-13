<?php
define('__ROOT__', dirname(dirname(__FILE__)));
use PHPMailer\PHPMailer\PHPMailer;
require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';
class changeromail
{
    public function validaremail($to,$name,$validacion)
    {
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = 'mx1.hostinger.com.ar';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'no-reply@changero.online';
        $mail->Password = 'vVlAzU8PyiZK';
        $mail->setFrom('no-reply@changero.online', 'Changero Online');
        $mail->addReplyTo('no-reply@changero.online', 'Changero Online');
        $mail->addAddress($to, $name);
        $mail->Subject = 'Changero - Validacion de email';
        $body = file_get_contents(__ROOT__."/../templates/email_val.html");
        
        $s_nombre = "%usuario_nombre%";
        $n_nombre = trim(utf8_decode($name));
        $body = str_replace($s_nombre, $n_nombre, $body);
        
        $s_val = "%validacion%";
        $n_val = trim(utf8_decode($validacion));
        $body = str_replace($s_val, $n_val, $body);
        
        //$mail->msgHTML(file_get_contents('email_val.html'), __DIR__);
        $mail->AltBody = 'This is a plain text message body';
        //$mail->addAttachment(''); 
        $mail->Body = $body;
        if (!$mail->send()) {
            return 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            return true;
        }
    }
}
//$s = new changeromail();
//$sd->validaremail('diego.ba.rodriguez@gmail.com','Diego','http://www.google.com');
?>