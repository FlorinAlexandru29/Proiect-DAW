<html>
<title> Laboratorul 1 - Forms </title>
<body>


<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

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







<FORM method="POST" action="contact.php">
<table border=0 width="40%" align="left">
  <tr>
    <td with="30%">Nume* :</td>
    <td with="70%"><INPUT TYPE="text" name="nume" required></td>
  </tr>
  <tr>
    <td>Email* :</td>
    <td><INPUT TYPE="email" name="email"></td>
  </tr>
  </tr>
    <td><INPUT TYPE="reset" VALUE="reset"></td>
    <td><INPUT TYPE="submit" VALUE="send"></td>
  </tr>
 </table>
 </form>
</body>
</html>