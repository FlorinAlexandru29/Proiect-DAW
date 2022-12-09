<?php


if(isset($_POST['submit'])){
$conditie_email="select email FROM users where email='".$_POST['email']." ' ";
$conditie_password="select email FROM users where password='".openssl_encrypt($_POST['parola'], 'AES-128-CTR', 'kalpsdnj', 0, '1234567891011121')." ' ";
echo $conditie_email;
echo $conditie_password;

$conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$result_email = mysqli_query($conexiune, $conditie_email);
$result_password = mysqli_query($conexiune, $conditie_password);
if ((mysqli_num_rows($result_email) > 0) && (mysqli_num_rows($result_password) > 0))  {
  echo "Login Realizat cu Succes";
  setcookie("user_name", $_POST['email'], time()+ 60,'/');
} else {
  echo "Nu a fost gasit contul";
}



mysqli_close($conexiune);
}
?>

<html>
  <body>
  <FORM method="POST" action="lab1-editat.php">
    Email* :
    <INPUT TYPE="email" name="email" required> <br>
    Parola* :
    <INPUT TYPE="password" name="parola" required>
    <INPUT TYPE="submit" name="submit" VALUE="send">
 </form>
 </body>
</html>
