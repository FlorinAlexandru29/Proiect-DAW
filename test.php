<?php

if (isset($_COOKIE["user_name"])) {
  header('Location:index.php');
} //redirect pe home page daca este deja autentificat
include 'fragmente/navbar_guest.php';


if(isset($_POST['creeaza_cont'])){

  if(($_POST['parola_i'])!=($_POST['parola_c']))
  {
    setcookie("confirmare_parola","FALSE", time()+30,"/");

    header('Location:creare_cont.php');
    //afisare notificare
  }
  else{

  $conditie_email="select email FROM users where email='".$_POST['email']." ' ";
  $conditie_user="select user_name FROM users where user_name='".$_POST['user_name']." ' ";

  $conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');

  if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }
  $result_email = mysqli_query($conexiune, $conditie_email);
  $result_user = mysqli_query($conexiune, $conditie_user);

  if (mysqli_num_rows($result_email) > 0) {echo "Acest email este deja asociat unui cont";mysqli_close($conexiune); } //afisare notificare,neaparat redirectionare altfel imi baga conturi aiurea
  if (mysqli_num_rows($result_user) > 0) {echo "Acest username este deja asociat unui cont";mysqli_close($conexiune); } //header('Location:creare_cont.php');
  
  else{
    $cerere="Insert into users(user_name,email,password) values ('".$_POST['user_name']."','" .$_POST['email'] ."','".openssl_encrypt($_POST['parola_i'], 'AES-128-CTR', 'kalpsdnj', 0, '1234567891011121')." ')";
    echo $cerere;
    mysqli_query($conexiune, $cerere);
    mysqli_close($conexiune);

    $r_email=$_POST['email'];
    $r_user_name=$_POST['username'];
    $subject= 'Confirmare Email';
    $body="Buna <br> Pentru a confirma email-ul acceseaza acest link <br>
    <a href='https://lure-prod.herokuapp.com/confirmare.php?email=".$_POST['email']."&code=".openssl_encrypt($_POST['parola_i'], 'AES-128-CTR', 'kalpsdnj', 0, '1234567891011121')."'>
    https://lure-prod.herokuapp.com/confirmare.php?email=".$_POST['email']."&code=".openssl_encrypt($_POST['parola_i'], 'AES-128-CTR', 'kalpsdnj', 0, '1234567891011121')."
    </a>
    <br> 
    O zi buna!
    <br>
    Va rugam sa nu raspundeti la acest email!";
    include 'tools/mailer.php';
    //afisare notificare (posibil in mailer.php?)
  }
  }
}
?>