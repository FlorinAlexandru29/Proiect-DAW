<html>
<title> Contact </title>
<body>


<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

//PHPMailer Object
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

//From email address and name

$mail->SetFrom("florin-alexandru.anghelescu@s.unibuc.ro","Florin Anghelescu", 0);
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

</body>
</html>