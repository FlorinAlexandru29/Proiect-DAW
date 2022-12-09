<?php
print_r($_POST);


echo $_POST['email'];
$conditie_email="select email FROM users where email='".$_POST['email']." ' ";
$conditie_user="select user_name FROM users where user_name='".$_POST['user_name']." ' ";
echo $conditie_email;
echo $conditie_user;


$conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');


if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }

if(isset($_POST['submit'])){
  $result_email = mysqli_query($conexiune, $conditie_email);
  $result_user = mysqli_query($conexiune, $conditie_user);

  if (mysqli_num_rows($result_email) > 0) {echo "Acest email este deja asociat unui cont";mysqli_close($conexiune);}
  if (mysqli_num_rows($result_user) > 0) {echo "Acest username este deja asociat unui cont";mysqli_close($conexiune);}
  
  else{
    $cerere="Insert into users(user_name,email,password) values ('".$_POST['user_name']."','" .$_POST['email'] ."','".crypt($_POST['parola'],'kalpsdnj')." ')";
    echo $cerere;
    mysqli_query($conexiune, $cerere);
    mysqli_close($conexiune);
    header('Location:creare_cont.php');
  }
}
?>

<html>
<title> Creare Cont </title>
<body>
<FORM method="POST" action="creare_cont.php">
<table border=0 width="40%" align="left">
  <tr>
    <td with="30%">User Name:</td>
    <td with="70%"><INPUT TYPE="text" name="user_name" required></td>
  </tr>
  <tr>
    <td>Email :</td>
    <td><INPUT TYPE="email" name="email" required></td>
  </tr>
  </tr>
    <tr>
    <td>Parola:</td>
    <td><INPUT TYPE="password" name="parola" required></td>
  </tr>
  <tr>
    <td><INPUT TYPE="reset" VALUE="reset"></td>
    <td><INPUT TYPE="submit" name="submit" VALUE="send"></td>
  </tr>
 </table>
 </form>
</body>
</html>