<?php

if (isset($_COOKIE["user_name"])) {
  header('Location:index.php');
} //redirect pe home page daca este deja autentificat
include 'fragmente/navbar_guest.php';






if(isset($_POST['creeaza_cont'])){
  if(($_POST['parola_i'])!=($_POST['parola_c']))
  {
    setcookie("confirmare_parola","FALSE", time()+1,"/");
    header('Location:creare_cont.php');
    //afisare notificare
  }

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
?>

<html>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Creare Cont </title>
    <link href="resurse/bootstrap/bootstrap.css" rel="stylesheet">
    <script src="resurse/bootstrap/bootstrap.bundle.js"></script>
    <style> @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap'); </style>
  </head>

<body>
<main class="form-signin w-100 m-auto" style="font-family: 'Montserrat', sans-serif;font-size: 2.1vh !important;">
  <div class="container d-flex flex-wrap justify-content-center justify-content-xl-start pt-5 mt-5" >
    <div class="align-self-center mx-auto my-auto pt-1 pt-md-4 pb-4" style="width:35%;">
      <hr class="my-4">
      <form method="POST" id="creare_cont" action="creare_cont.php">
      <div class="mb-3 input-group-lg">
        <label for="user_name" class="form-label">Nume de utilizator</label>
        <input type="text" id="user_name" class="form-control" name="user_name" required>
      </div>
      <div class="mb-3 input-group-lg">
        <label for="email" class="form-label" >Email</label>
        <input type="email" id="email" class="form-control" name="email" required>
      </div>
      <div class="mb-3 input-group-lg">
        <label for="password_1" class="form-label">Parola</label>
        <input type="password" id="password_1" class="form-control" name="parola_i" required>
      </div>
      <div class="mb-3 input-group-lg">
        <label for="password_2" class="form-label" >Confirma Parola</label>
        <input type="password" id="password_2" class="form-control" name="parola_c" required>
      </div><hr class="my-4">
        <input type="submit" value="Creeaza cont" name="creeaza_cont" form="creare_cont" class="mx-auto w-100 btn btn-primary shadow-primary" style="font-family: 'Montserrat', sans-serif;font-size: 2.1vh !important;">
      </form>
      
    </div>
  </div>
    <?php
    
    if(isset($_COOKIE["confirmare_parola"])){
      echo "Parolele introduse nu sunt identice!";
      setcookie("confirmare_parola","FALSE", time()-1,"/");
    }
    ?>
</body>
</html>