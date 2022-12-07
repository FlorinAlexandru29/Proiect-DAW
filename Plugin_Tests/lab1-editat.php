<?php

$conditie="select email FROM users where email='".$_POST['email']." ' ";
echo $conditie;

$conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$result = mysqli_query($conexiune, $conditie);
echo $result;
mysqli_close($conexiune);

?>

<html>
  <body>
  <FORM method="POST" action="lab1-editat.php">
  Email* :
    <INPUT TYPE="email" name="email"><INPUT TYPE="submit" name="submit" VALUE="send">
 </form>
 </body>
</html>
