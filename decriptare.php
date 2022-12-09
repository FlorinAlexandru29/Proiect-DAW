<?php

$ciphering = "AES-128-CTR";
$encryption_iv = '1234567891011121';
$decryption_iv = '1234567891011121';

//$encryption = openssl_encrypt($_POST('parola'), $ciphering,
           // "kalpsdnj", 0, $encryption_iv);

//echo $encryption;



//$decryption=openssl_decrypt ($_POST('parola_cryptata'), $ciphering,  "kalpsdnj", 0, $decryption_iv);

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
      