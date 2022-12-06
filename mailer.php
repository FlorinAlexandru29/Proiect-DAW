<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once('Plugin_Tests/phpmailer/class.phpmailer.php');

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit']))
{
    $name=$_POST['nume'];
    $email=$_POST['email'];
    $telephone=$_POST['telefon'];
    $message=$_POST['mesaj'];

    try{
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

    }
    
    catch(Exception $e){
        $altert="<div class='alert-error'><span>Eroare Trimitere!'.$e->getMessage().'</span></div>"; 
    }

}

