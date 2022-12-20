<?php


require_once('resurse/phpmailer/class.phpmailer.php');


$mail = new PHPMailer(true); 

$mail->IsSMTP();

$mail->SMTPDebug = 2;


    $name=$_POST['nume'];
    $email=$_POST['email'];
    $telephone=$_POST['telefon'];
    $message=$_POST['mesaj'];

    if(isset($_POST['submit'])){

      $subject="Contact ".$name;
      $body="Nume: $name <br> Email: $email <br> Telefon: $telephone <br> Mesaj: $message";
      $r_email='lure.production@gmail.com';
      $r_user_name='Lure Prod';
      include 'tools/mailer.php';
}

?>



<html>
<title> Contact </title>
<body>

<FORM method="POST" >
<table border=0 width="40%" align="left">
  <tr>
    <td with="30%">Nume* :</td>
    <td with="70%"><INPUT TYPE="text" name="nume" required></td>
  </tr>
    <td>Email* :</td>
    <td><INPUT TYPE="email" name="email"></td>
  </tr>
  </tr>
    <tr>
    <td>Telefon</td>
    <td><INPUT TYPE="tel" name="telefon"></td>
  </tr>
  </tr>
    <td>Mesaj :</td>
    <td><INPUT TYPE="text" name="mesaj"></td>
  </tr>
  <tr>
    <td><INPUT TYPE="submit" name="submit" VALUE="send"></td>
  </tr>
 </table>
 </form>
 </div>
</body>
</html>