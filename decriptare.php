<?php



if(isset($_POST['submit'])){
  $ciphering = "AES-128-CTR";
  $encryption_iv = '1234567891011121';
  $iv_length = openssl_cipher_iv_length($ciphering);
  $options = 0;
  $encryption_key = $_POST['parola'];

  $encryption = openssl_encrypt($_POST['parola'], $ciphering,
  "kalpsdnj", 0, $encryption_iv);

echo $encryption;



//$decryption=openssl_decrypt ($_POST('parola_cryptata'), $ciphering,  "kalpsdnj", 0, $decryption_iv);

}

?>
        <html>
        <body>
        <FORM method="POST" action="decriptare.php">
          Email* :
          <INPUT TYPE="text" name="parola" required> <br>

          <INPUT TYPE="submit" name="submit" VALUE="send">
       </form>
       </body>
      </html>
      