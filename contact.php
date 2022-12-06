<?php 
include 'mailer.php';
?>
<html>
<title> Contact </title>
<body>

<FORM method="POST" action="lab1-editat.php">
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
    <td><INPUT TYPE="submit" VALUE="send"></td>
  </tr>
 </table>
 </form>
 <div> <?php 
$alert;

 ?>
 </div>
</body>
</html>