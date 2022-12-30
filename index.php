<?php

if(isset($_POST['logout'])){     //scriptul de logout
  setcookie("user_name", "guest", time()- 60,'/');
  setcookie("profile_pic", '',time()-60,'/');
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
  include 'login_v2.php';}
if(isset($_POST['login-mobile'])){ 
  $email=$_POST['email_mobile'];
  $password=$_POST['password_mobile'];
  include 'login_v2.php';}




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
    </head>
 
  <body>
  <?php 
  if (isset($_COOKIE["user_name"])) include 'header_user.php';
  else include 'fragmente/navbar_guest.php'
  ?>
  </body>
</html>


