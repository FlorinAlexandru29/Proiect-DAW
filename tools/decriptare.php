<?php



if(isset($_POST['submit'])){
  if(isset($_POST['parola'])){

  $encryption = openssl_encrypt($_POST['parola'], "AES-128-CTR", "kalpsdnj", 0, '1234567891011121');

  echo $encryption;}

if(isset($_POST['parola_criptata'])){

$decryption=openssl_decrypt ($_POST['parola_criptata'], "AES-128-CTR", "kalpsdnj", 0, '1234567891011121');
echo $decryption;}

}
?>
        <html>
        <body>
        <FORM method="POST" action="decriptare.php">
          Parola :
          <INPUT TYPE="text" name="parola"> <br>
          Parola Criptata
          <INPUT TYPE="text" name="parola_criptata"> <br>
          <INPUT TYPE="submit" name="submit" VALUE="send">
       </form>
       </body>
      </html>
      