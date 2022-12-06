<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('class.phpmailer.php');

$mail->SMTPDebug  = 5;   
//PHPMailer Object
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

//From email address and name
$mail->From = 'florin-alexandru.anghelescu@s.unibuc.ro';
$mail->FromName = 'Florin Anghelescu';

//To address and name
$mail->addAddress("lure.production@gmail.com", "Lure Prod");

//Address to which recipient will reply
$mail->addReplyTo('florin-alexandru.anghelescu@s.unibuc.ro', "Reply");


//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "Subject Text";
$mail->Body = "<i>Mail body in HTML</i>";
$mail->AltBody = "This is the plain text version of the email content";

try {
    $mail->send();
    echo "Message has been sent successfully";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}

?>
