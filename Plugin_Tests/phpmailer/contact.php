<html>
<title> Laboratorul 1 - Forms </title>
<body>


<?php

//sursa: https://github.com/PHPMailer/PHPMailer
//tutorial: https://alexwebdevelop.com/phpmailer-tutorial/
//Gmail restriction: https://support.google.com/mail/answer/22370?hl=en

require_once('class.phpmailer.php');
require_once('mail_config.php');

// Mesajul
$message = "Line 1 Line 2 Line 3";

// În caz că vre-un rând depășește N caractere, trebuie să utilizăm
// wordwrap()
$message = wordwrap($message, 6, "<br />\n");


$mail = new PHPMailer(true); 

$mail->IsSMTP();


try {
 
  $mail->SMTPDebug  = 5;                     
  $mail->SMTPAuth   = true; 

  $to='lure.production@gmail.com';
  $nume='Lure Prod';

  $mail->SMTPSecure = "ssl";                 
  $mail->Host       = "smtp.gmail.com";    
  $mail->Port       = 465;                   
  $mail->Username   = $_POST['email'];  			// GMAIL username
  $mail->AddReplyTo($_POST['email'], $_POST['nume']);
  $mail->AddAddress($to, $nume);
 
  $mail->SetFrom($_POST['email'], $_POST['nume']);
  $mail->Subject = 'Contact';
  $mail->AltBody = 'To view this post you need a compatible HTML viewer!'; 
  $mail->MsgHTML($message);
  $mail->Send();
  echo "Message Sent OK</p>\n";
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //error from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //error from anything else!
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