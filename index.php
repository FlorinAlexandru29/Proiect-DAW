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


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link href="resurse/bootstrap/bootstrap.css" rel="stylesheet">
  </head>
  <body>
  <script src="resurse/bootstrap/bootstrap.bundle.js"></script>

<div>

   <a href='creare_cont.php'> <button> Creeaza Cont </button> </a>  
   <?php
   if (!(isset($_COOKIE["user_name"]))) echo "<a href='login.php'> <button> Autentifica-te </button> </a> " ?>
</div>
  </body>
</html>


