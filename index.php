<?php

if(isset($_POST['logout'])){     //scriptul de logout
  setcookie("user_name", "", time()- 259200,'/');
  header('Location:index.php');
}
@session_start();

if(isset($_POST['login-expanded'])) {
  $email=$_POST['email_expanded'];
  $password=$_POST['password_expanded'];
  $pagina_request_login="index.php";
  include 'tools/login.php';}

if(isset($_POST['login-mobile'])){ 
  $email=$_POST['email_mobile'];
  $password=$_POST['password_mobile'];
  $pagina_request_login="index.php";
  include 'tools/login.php';}

if(isset($_POST['forgot_password'])) include 'tools/forgot_password.php'


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link href="resurse/bootstrap/bootstrap.css" rel="stylesheet">
    <script src="resurse/bootstrap/bootstrap.bundle.js"></script>
    <style> @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap'); </style>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
 
  <body>
  <?php 
  if (isset($_COOKIE["user_name"])) include 'fragmente/navbar_user.php';
  else {$pagina_request_login="index.php";
    include 'fragmente/navbar_guest.php';}


    if(isset($_SESSION["activare_cont_success"])){
      echo "
          <div class='position-absolute top-50 start-50 translate-middle toast show align-items-center text-bg-success border-0 toast-creare-cont' role='alert' aria-live='assertive' aria-atomic='true' style='z-index:1;width:90%;font-size:1.1rem;'>
          <div class='d-flex h-100'>
          <div class='mx-auto my-auto text-center toast-body' style='width:100%;'>
              Contul tau a fost confirmat cu success!
          </div>
          <button type='button' class='btn-close btn-close-white me-2 m-auto' data-bs-dismiss='toast' aria-label='Close' style='width:3%;'></button>
          </div> </div>";
          unset($_SESSION['activare_cont_success']);
     }
     if(isset($_SESSION["activare_cont_fail"])){
      echo "
          <div class='position-absolute top-50 start-50 translate-middle toast show align-items-center text-bg-danger border-0 toast-creare-cont' role='alert' aria-live='assertive' aria-atomic='true' style='z-index:1;width:90%;font-size:1.1rem;'>
          <div class='d-flex h-100'>
          <div class='mx-auto my-auto text-center toast-body' style='width:100%;'>
              ".$_SESSION["activare_cont_fail"]."
          </div>
          <button type='button' class='btn-close btn-close-white me-2 m-auto' data-bs-dismiss='toast' aria-label='Close' style='width:3%;'></button>
          </div> </div>";
          unset($_SESSION['activare_cont_fail']);
     }
     if(isset($_SESSION["login_pop_up"])){
      echo "
          <div class='position-absolute top-50 start-50 translate-middle toast show align-items-center text-bg-danger border-0 toast-creare-cont' role='alert' aria-live='assertive' aria-atomic='true' style='z-index:1;width:90%;font-size:1.1rem;'>
          <div class='d-flex h-100'>
          <div class='mx-auto my-auto text-center toast-body' style='width:100%;'>
              ".$_SESSION['login_pop_up']."
          </div>
          <button type='button' class='btn-close btn-close-white me-2 m-auto' data-bs-dismiss='toast' aria-label='Close' style='width:3%;'></button>
          </div> </div>";
          unset($_SESSION['login_pop_up']);
     }

     if(isset($_SESSION["index.php"])){
      echo "
          <div class='position-absolute top-50 start-50 translate-middle toast show align-items-center text-bg-success border-0 toast-creare-cont' role='alert' aria-live='assertive' aria-atomic='true' style='z-index:1;width:90%;font-size:1.1rem;'>
          <div class='d-flex h-100'>
          <div class='mx-auto my-auto text-center toast-body' style='width:100%;'>
              Codul a fost trimis cu success
          </div>
          <button type='button' class='btn-close btn-close-white me-2 m-auto' data-bs-dismiss='toast' aria-label='Close' style='width:3%;'></button>
          </div> </div>";
          unset($_SESSION['index.php']);
     }
     if(isset($_SESSION["eroare_trimitere"])){
      echo "
          <div class='position-absolute top-50 start-50 translate-middle toast show align-items-center text-bg-danger border-0 toast-creare-cont' role='alert' aria-live='assertive' aria-atomic='true' style='z-index:1;width:90%;font-size:1.1rem;'>
          <div class='d-flex h-100'>
          <div class='mx-auto my-auto text-center toast-body' style='width:100%;'>
              ".$_SESSION['eroare_trimitere']."
          </div>
          <button type='button' class='btn-close btn-close-white me-2 m-auto' data-bs-dismiss='toast' aria-label='Close' style='width:3%;'></button>
          </div> </div>";
          unset($_SESSION['eroare_trimitere']);
     }

     if(isset($_SESSION['stergere_success'])){
      echo "
          <div class='position-absolute top-50 start-50 translate-middle toast show align-items-center text-bg-success border-0 toast-creare-cont' role='alert' aria-live='assertive' aria-atomic='true' style='z-index:1;width:90%;font-size:1.1rem;'>
          <div class='d-flex h-100'>
          <div class='mx-auto my-auto text-center toast-body' style='width:100%;'>
              ".$_SESSION['stergere_success']."
          </div>
          <button type='button' class='btn-close btn-close-white me-2 m-auto' data-bs-dismiss='toast' aria-label='Close' style='width:3%;'></button>
          </div> </div>";
          unset($_SESSION['stergere_success']);
     }
     
  ?>
   <div class="py-5 mx-auto row row-cols-1 row-cols-lg-3 g-4" style="width:80%;">
   <?php 
   //afisare trupe
    $conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }
    $cerere_trupe="SELECT nume,descriere FROM trupe ORDER BY nume";
    $result_trupe= mysqli_query($conexiune, $cerere_trupe);
    if (mysqli_num_rows($result_trupe) > 0){
		while ($row_trupe = mysqli_fetch_assoc($result_trupe)) {
      $descriere_cut = str_split($row_trupe['descriere'], 120);
    	echo "<div class='col'>
      <div class='card px-0 h-100 card-hover'>
      <img src='https://storage.googleapis.com/lure-prod-bucket/bands/".$row_trupe['nume']."/".$row_trupe['nume']."_Poza1.jpg' class='card-img-top' alt='".$row_trupe['nume']."'>
      <a href='trupa.php?id=".str_replace(" ","+",$row_trupe['nume'])."' class='stretched-link text-decoration-none link-dark'>
      <div class='card-body'>
      <h5 class='card-title'>".$row_trupe['nume']."</h5>
      <p class='card-text'>".$descriere_cut[0]."...</p>
      </a>
      </div>
      </div>
      </div>
      ";
}
    }
    ?>
    </div>
<!-- sfarsit afisare trupe -->
  </body>
</html>


