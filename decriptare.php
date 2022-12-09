<?php



if(isset($_POST['submit'])){
  $ciphering = "AES-128-CTR";
  $encryption_iv = '1234567891011121';
  $iv_length = openssl_cipher_iv_length($ciphering);
  $options = 0;
  if(isset($_POST['parola'])){

  $encryption = openssl_encrypt($_POST['parola'], $ciphering, "kalpsdnj", 0, $encryption_iv);

echo $encryption;}

if(isset($_POST['parola_criptata'])){

$decryption=openssl_decrypt ($_POST('parola_criptata'), $ciphering, "kalpsdnj", 0, $encryption_iv);
echo $decryption;}

}
?>
        <html>
        <body>
        <FORM method="POST" action="decriptare.php">
          Email* :
          <INPUT TYPE="text" name="parola" required> <br>
          <INPUT TYPE="text" name="parola_criptata" required> <br>
          <INPUT TYPE="submit" name="submit" VALUE="send">
       </form>
       </body>
      </html>
      