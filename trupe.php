<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trupe</title>
    <link href="resurse/bootstrap/bootstrap.css" rel="stylesheet">
    <script src="resurse/bootstrap/bootstrap.bundle.js"></script>
    <style> @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap'); </style>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
<?php    if(isset($_POST['logout'])){     //scriptul de logout
  setcookie("user_name", "guest", time()- 120,'/');
  setcookie("profile_pic", '',time()-120,'/');
  header('Location:index.php');
}
@session_start();
if(isset($_SESSION['activat'])){
echo "activeaza-ti contul";
unset($_SESSION['activat']);
}

if(isset($_POST['login-expanded'])) {
  $email=$_POST['email_expanded'];
  $password=$_POST['password_expanded'];
  include 'tools/login.php';}

if(isset($_POST['login-mobile'])){ 
  $email=$_POST['email_mobile'];
  $password=$_POST['password_mobile'];
  include 'tools/login.php';}

if(isset($_POST['forgot_password'])) include 'tools/forgot_password.php';
if (isset($_COOKIE["user_name"])) include 'fragmente/navbar_user.php';
else include 'fragmente/navbar_guest.php'
?>
    
    <div class="py-5 mx-auto row row-cols-1 row-cols-lg-3 g-4" style="width:80%;">

    <?php 
    $conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }
    $cerere_trupe="SELECT nume,descriere FROM trupe";
    $result_trupe= mysqli_query($conexiune, $cerere_trupe);
    if (mysqli_num_rows($result_trupe) > 0){
		while ($row_trupe = mysqli_fetch_assoc($result_trupe)) {
    	echo "<div class='col'>
      <div class='card px-0 h-100 card-hover'>
      <img src='https://storage.googleapis.com/lure-prod-bucket/bands/".$row_trupe['nume']."/".$row_trupe['nume']."_Poza1.jpg' class='card-img-top' alt='".$row_trupe['nume']."'>
      <a href='#' class='text-decoration-none link-dark'>
      <div class='card-body'>
      <h5 class='card-title'>".$row_trupe['nume']."</h5>
      <p class='card-text'>".$row_trupe['descriere']."</p>
      </a>
      </div>
      </div>
      </div>
      ";
}

    }

    ?>
      
      
    </div>