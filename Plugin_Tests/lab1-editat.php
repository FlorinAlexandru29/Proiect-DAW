<html>
<title> Laboratorul 1 - Forms </title>
<body>
<?php
print_r($_POST);
$conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}


$cerere="Insert into users(last_name,first_name,email,password) values ('".$_POST['nume']. "','".$_POST['prenume']. "','" .$_POST['email'] ."','".crypt($_POST['parola'],'sadlsadl')." ')";
mysqli_query($conexiune, $cerere);
mysqli_close($conexiune);
echo $cerere;
?>
<FORM method="POST" action="lab1-editat.php">
<table border=0 width="40%" align="left">
  <tr>
    <td with="30%">Nume* :</td>
    <td with="70%"><INPUT TYPE="text" name="nume" required></td>
  </tr>
   <tr>
    <td>Prenume* :</td>
    <td><INPUT TYPE="text" name="prenume"></td>
  </tr>
  <tr>
    <td>Email* :</td>
    <td><INPUT TYPE="email" name="email"></td>
  </tr>
  </tr>
    <tr>
    <td>Parola:</td>
    <td><INPUT TYPE="password" name="parola"></td>
  </tr>
  <tr>
    <td><INPUT TYPE="reset" VALUE="reset"></td>
    <td><INPUT TYPE="submit" VALUE="send"></td>
  </tr>
 </table>
 </form>
</body>
</html>