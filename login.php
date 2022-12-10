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

  $cerere_user="SELECT user_name,activat FROM users WHERE email='".$_POST['email']." ' ";
     $result_user= mysqli_query($conexiune, $cerere_user);
  $row = mysqli_fetch_assoc($result_user);
  setcookie("user_name", $row["user_name"], time()+ 60,'/');
  @session_start();

  if($row["activat"]==0) {
    $_SESSION['activat'] = 0;
  }
  else {
    $_SESSION['activat'] = 1 ;
  }

  mysqli_close($conexiune);

  header('Location:index.php');
} 
  else {
    if (mysqli_num_rows($result_email) > 0) {mysqli_close($conexiune);
      echo "Parola Gresita!";}
    else {mysqli_close($conexiune); 
      echo "<p> Nu a fost gasit un utilizator pentru acest email</p>";
    }
}
}
?>

<html>
<title> Login </title>
  <body>
  <FORM method="POST" action="login.php">
    Email* :
    <INPUT TYPE="email" name="email" required> <br>
    Parola* :
    <INPUT TYPE="password" name="parola" required>
    <INPUT TYPE="submit" name="submit" VALUE="send">
 </form>
 <alert> <?php $alert?> </alert>
 <a href='creare_cont.php'> <button> Creeaza Cont </button> </a> 
 <a href='index.php'> <button> Home </button> </a> 
 </body>
</html>

