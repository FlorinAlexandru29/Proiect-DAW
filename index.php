<?php

$username=$_POST['username'];
if(isset($_POST['login']))
{
  setcookie("user_name", $username, time()+ 60,'/');
  header('Location:index.php');
}

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

</div>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="resurse/bootstrap/bootstrap.css" rel="stylesheet">
  </head>
  <body>
  <script src="resurse/bootstrap/bootstrap.bundle.js"></script>

<div>

<FORM method="POST" action='index.php'>
<table border=0 width="40%" align="left">
  <tr>
    <td with="30%">User* :</td>
    <td with="70%"><INPUT TYPE="text" name="username" required></td>
  </tr>
  <tr>
    <td with="30%">Password :</td>
    <td with="70%"><INPUT TYPE="password" name="password" required></td>
  </tr>
  <td><INPUT TYPE="submit" name="login" VALUE="login"></td>
  </form>
  <tr>
  <td>

   <a href='creare_cont.php'><Button TYPE='submit' VALUE="Creaza Cont"> </button> </a> 

  </td></tr>
  </table>

  </body>
</html>


