<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link href="resurse/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="resurse/bootstrap/bootstrap_button.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="resurse/bootstrap/bootstrap.bundle.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  </head>
<?php 
  if (isset($_COOKIE["user_name"])) include 'header_user.php';
  else header('Location:index.php');
   $conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');

  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();}

$cerere_user="SELECT email,activat FROM users WHERE user_name='".$_COOKIE['user_name']." ' ";
$result_user= mysqli_query($conexiune, $cerere_user);
$row = mysqli_fetch_assoc($result_user); 
mysqli_close($conexiune);
?>
<div class="container text-center mt-3">
  <div class="row">
    <div class="col">
    <ul class='list-group'>
    <li class='list-group-item'>
    <div class="d-table position-relative mx-auto mt-2 mt-lg-4 pt-5 mb-3">
<?php

if(isset($_COOKIE["profile_pic"])){
    echo "
    <img src='resurse/profile_pics/".$_COOKIE["profile_pic"].".png' width='200' class='d-block img-thumbnail rounded-circle' alt='Profile Pic'>";
  }
  else echo "
  <img src='resurse/profile_pics/guest.png' width='200' class='d-block img-thumbnail rounded-circle' alt='Guest Profile Pic'>";

  ?>
<button type="button" class="btn btn-icon btn-light bg-white btn-sm border rounded-circle shadow-sm position-absolute bottom-0 end-0 ms-3" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Change picture">
                    <i class="bx bx-refresh bx-md"></i>
                  </button>
</div>
</li>
  <?php
  echo 
  
  "
  <li class='list-group-item'> user_name: ".$_COOKIE['user_name']." </li>
  <li class='list-group-item'> email: ".$row['email']." </li>
  </ul>";
?>
    </div>
    <div class="col">
    <ul class='list-group'>
    <li class='list-group-item'>
      <?php
       echo "status cont: ";
    if ($row['activat']==1) echo "Contul tau este activat!";
    else echo "Contul tau nu este activat";
     
      ?>
        </li>
    </div>
  </div>
</div>