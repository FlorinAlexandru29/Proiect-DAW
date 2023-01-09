<?php 
if(isset($_GET["id"]))
{
  $conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');

  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
  $trupa=str_replace("+"," ",$_GET["id"]);
  echo $trupa;
 /*  
  $cerere_trupa="SELECT * FROM trupa WHERE nume='".$trupa." ' ";
  $result_trupa= mysqli_query($conexiune, $cerere_trupa);
  $row_trupa = mysqli_fetch_assoc($result_trupa);
  mysqli_close($conexiune); */
  

}
else {header('Location:index.php');exit();}


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trupa</title>
    <link href="resurse/bootstrap/bootstrap.css" rel="stylesheet">
    <script src="resurse/bootstrap/bootstrap.bundle.js"></script>
    <style> @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap'); </style>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <style>

.carousel-inner .carousel-item img{
max-height:400px;
object-position:center;
overflow:hidden;
}

@media(max-width:768px){
.carousel .carousel-inner{

height:auto
 }
}
    </style>
<?php

if(isset($_POST['logout'])){     //scriptul de logout
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
    <main class="form-signin w-100 m-auto" style="font-family: 'Montserrat', sans-serif;font-size: 1.2rem !important;">
        <div class="container d-flex flex-wrap justify-content-center justify-content-xl-start mt-5" >
          <div class="align-self-center mx-auto my-auto pt-md-4 pb-4" style="width:70%;">
            <div id="carouselExampleControls" class="carousel slide pb-3" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="https://storage.googleapis.com/lure-prod-bucket/bands/Implant/Implant_Poza2.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="https://storage.googleapis.com/lure-prod-bucket/bands/Implant/Implant_Poza1.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="https://storage.googleapis.com/lure-prod-bucket/bands/Implant/Implant_Poza2.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
                </div>
        <?php 
    /*     echo "<p>".$result_trupa["nume"]."</p>
        <div class='d-flex justify-content-between'>
        <p> Oras: ".$result_trupa['oras']."</p>
        <p> Gen: ".$result_trupa['gen']."</p>
        <p> An Infiintare: ".$result_trupa['year']."</p>
        </div>
        " */
        ?>
      </div>
      </div>
      </main>