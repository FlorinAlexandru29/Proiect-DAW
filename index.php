<?php

if(isset($_POST['logout'])){     //scriptul de logout
  setcookie("user_name", "guest", time()- 60,'/');
  header('Location:index.php');
}



if (isset($_COOKIE["user_name"])) {
  echo 'Hello:'.$_COOKIE["user_name"];
  
  echo "
  <FORM method='POST' action='index.php'>
  <INPUT TYPE='submit' name='logout' VALUE='logout'>
  </form>
  ";
}
else {
  echo 'Hello: guest';
 // expires after 60 seconds
}
@session_start();
if(isset($_SESSION['activat'])){
echo "activeaza-ti contul";
unset($_SESSION['activat']);
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link href="resurse/bootstrap/bootstrap.css" rel="stylesheet">
  </head>
  <?php 
  if (isset($_COOKIE["user_name"])) include 'header_user.php';
  else include 'header_guest.php'
  ?>
  <body>
  <script src="resurse/bootstrap/bootstrap.bundle.js"></script>
  </body>
</html>


