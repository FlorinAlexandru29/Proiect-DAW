<?php

//sursa: https://github.com/PHPMailer/PHPMailer
//tutorial: https://alexwebdevelop.com/phpmailer-tutorial/
//Gmail restriction: https://support.google.com/mail/answer/22370?hl=en

require_once('class.phpmailer.php');
require_once('mail_config.php');


$mail = new PHPMailer(true); 

$mail->IsSMTP();

$name='nume';
    $email='email';
    $telephone='076456465465';
    $message='mesaj';

try {
 
  $mail->SMTPAuth   = true; 
        $to='lure.production@gmail.com';
        $nume='Lure Prod';
      
        $mail->SMTPSecure = "ssl";                 
        $mail->Host       = "smtp.gmail.com";    
        $mail->Port       = 465;                  
        $mail->Username   = 'lure.production@gmail.com'; 			// GMAIL username
        $mail->Password   = 'lvupjjdmckeunbal';           // GMAIL password
        $mail->AddReplyTo('lure.production@gmail.com', 'Lure Prod');
        $mail->AddAddress('lure.production@gmail.com', 'Lure Prod');

        $mail->isHTML(true);
        $mail->Subject = 'Contact:' .$name;
        $mail->Body = "Nume: $nume <br> Email: $email <br> Telefon: $telephone <br> Mesaj: $message";

        $mail->send();
        $altert="<div class='alert-success'><span>Mesaj Trimis</span></div>";
  echo "Message Sent OK</p>\n";
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //error from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //error from anything else!
}
?>
